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

    public function getPhotoAttribute()
    {
        $uuid_course = $this->uuid;

        return asset("uploads/courses/$uuid_course/".$this->attributes['photo']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
