<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
        'description',
        'semester_id',
    ];

    public function semester()
    {
        return $this->belongsTo(Level::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
