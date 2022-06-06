<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
        'level_id',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function ues()
    {
        return $this->hasMany(Ue::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($semester) { // before delete() method call this
            $semester->ues()->delete();
        });
    }
}
