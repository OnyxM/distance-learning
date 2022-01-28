<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function parts()
    {
        return $this->hasMany(Part::class);
    }
}
