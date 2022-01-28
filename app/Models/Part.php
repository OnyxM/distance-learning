<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'content',
        'td',
        'tp',
        'course_id',
        'part_uuid',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
