<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Ue;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChapterController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'ue' => "required|exists:ues,id",
            'chapter_name' => "required",
            'document' => ['required','mimes:pdf']
        ]);

        // on check que le auth est teacher et est lié à ce cours ...
        if(!in_array(auth()->user()->teacher->id, Ue::find($request->ue)->teachers()->pluck('teachers.id')->toArray())){
            abort(404);
        }

        $doc_file= $request->document;
        $doc_name = explode(".", $doc_file->getClientOriginalName());
        $doc_name = Str::uuid().".".end($doc_name);
        $doc_file->move("uploads/chapters/", $doc_name);

        $td_name = null; $tp_name = null;

        if(!is_null($request->td)){
            $td_file= $request->td;
            $td_name = explode(".", $td_file->getClientOriginalName());
            $td_name = Str::uuid().".".end($td_name);
            $td_file->move("uploads/chapters/", $td_name);
        }
        if(!is_null($request->tp)){
            $tp_file= $request->tp;
            $tp_name = explode(".", $tp_file->getClientOriginalName());
            $tp_name = Str::uuid().".".end($tp_name);
            $tp_file->move("uploads/chapters/", $tp_name);
        }

        Chapter::create([
            'name' => $request->chapter_name,
            'document' => $doc_name,
            'td' => $td_name,
            'tp' => $tp_name,
            'ue_id' => $request->ue,
        ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'ue' => "required",
            'del_chap' => "required",
        ]);

        $ue = auth()->user()->teacher->ues()->where('ues.id', $request->ue)->first();
        if(is_null($ue)){
            abort(404);
        }
        $chap = $ue->chapters()->where('chapters.id', $request->del_chap)->first();
        if(is_null($chap)){
            abort(404);
        }

        $chap->delete();

        return redirect()->back();
    }
}
