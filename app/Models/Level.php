<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
        'description',
        'pension',
        'field_id',
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }
}
