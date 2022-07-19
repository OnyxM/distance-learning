<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'document',
        'td',
        'tp',
        'ue_id',
    ];

    public function ue()
    {
        return $this->belongsTo(Ue::class);
    }

    public function getDocumentAttribute()
    {
        return "uploads/chapters/" . $this->attributes['document'];
    }

    public function getTdAttribute()
    {
        return is_null($this->attributes['td']) ? null : "uploads/chapters/".$this->attributes['td'];
    }

    public function getTpAttribute()
    {
        return is_null($this->attributes['tp']) ? null : "uploads/chapters/".$this->attributes['tp'];
    }
}
