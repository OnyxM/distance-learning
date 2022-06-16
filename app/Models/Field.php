<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
        'description'
    ];



    public function getPhotoAttribute(){
        return asset("assets/img/fields/".$this->attributes['photo']);
    }

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($field) { // before delete() method call this
//            foreach ($field->levels() as $level) {
//                foreach ($level->semesters() as $semester) {
//                    $semester->ues()->delete();
//                }
//                $level->delete();
//            }
            $field->levels()->delete();
        });
    }

}
