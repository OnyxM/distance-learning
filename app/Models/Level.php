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

    public function ues()
    {
        return $this->hasManyThrough(Ue::class, Semester::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class)->withPivot("registration_date");
    }

    // this is a recommended way to declare event handlers
//    public static function boot() {
//        parent::boot();
//
//        static::deleting(function($level) { // before delete() method call this
//            foreach ($level->semesters as $semester) {
//                $semester->ues()->delete();
//            }
//            $level->semesters()->delete();
//        });
//    }
}
