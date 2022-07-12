<?php

namespace App\Http\Controllers;

use App\Models\Live;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LiveController extends Controller
{
    public static function generateLiveCode(){
        /**
         * gen un code
         * vérifier en Bd son unicité
         **/

        // return $code;
    }

    /**
     * Récupérer la liste des Lives créés de l'utilisateur connecté
     */
    public function getUserLives()
    {
        $data = [
            'title' => "Live - ",
            'lives' => auth()->user()->lives
        ];

        return view("user.lives.index", $data);
    }

    public function getNbreConectedUsers(Request $request)
    {
        $live = Live::where('uuid', $request->uid)->first();

        echo json_encode([
            'users' => $live->participants->count()
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => "string",
            'start_time' => "date",
            'ue' => "required|exists:ues,id",
        ]);

        Live::create([
            'uuid' => Str::uuid(),
            'titre' => $request->title,
            'date_debut' => strtotime($request->start_time),
            'user_id' => auth()->user()->id,
            'ue_id' => $request->ue
        ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'live' => "required",
        ]);

        $live = Live::where([
            'id' => $request->live,
            'user_id' => auth()->user()->id
        ])->first();

        if(!is_null($live)) {
            $live->delete();
        }

        return redirect()->back();
    }

    public function live($live_code)
    {
        $live = Live::where('uuid', $live_code)->first();

        if(is_null($live)){
            abort(404);
        }

        $data = [
            'title' => "Assist Live - ",
            'live' => $live,
        ];

        return view("user.lives.assist", $data);
    }
}
