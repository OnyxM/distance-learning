<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'code',
        'slug',
        'description',
        'syllabus',
        'semester_id',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
