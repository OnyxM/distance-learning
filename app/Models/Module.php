<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
        'intro',
        'td',
        'tp',
        'uuid',
        'course_id'
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
