<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'title',
        'slug',
        'price',
        'description',
        'category_id',
        'uuid',
        'photo',
        'user_id',
    ];

    protected $appends=[
        'substr_description'
    ];

    public function getPhotoAttribute()
    {
        if($this->attributes['photo'] == "course-4.jpg"){
            return asset("assets/img/".$this->attributes['photo']);
        }
        $uuid_course = $this->uuid;

        return asset("uploads/courses/$uuid_course/".$this->attributes['photo']);
    }

    public function getSubstrDescriptionAttribute()
    {
        $substr_description = $this->attributes['description'];

        return substr($substr_description, 0, 400). "(...)";
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function participants()
//    {
//        return $this->belongsToMany(User::class)->withPivot("registration_date", "comment", "playback_level");
//    }
}
