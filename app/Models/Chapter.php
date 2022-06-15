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
}
