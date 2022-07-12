<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;

    protected $fillable=[
        'stream_code', 'uuid', 'titre', 'date_debut', 'user_id', 'ue_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ue()
    {
        return $this->belongsTo(Ue::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class)->withPivot("date_adhésion");
    }
}
