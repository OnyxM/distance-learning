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

    public function getIntroAttribute()
    {
        $course_uuid = $this->course->uuid;
        $module_uuid = $this->uuid;
        $intro = $this->attributes['intro'];

        return asset("uploads/courses/$course_uuid/$module_uuid/$intro");
    }

    public function getTdAttribute()
    {
        $course_uuid = $this->course->uuid;
        $module_uuid = $this->uuid;
        $td = $this->attributes['td'];

        return asset("uploads/courses/$course_uuid/$module_uuid/$td");
    }

    public function getTpAttribute()
    {
        $course_uuid = $this->course->uuid;
        $module_uuid = $this->uuid;
        $tp = $this->attributes['tp'];

        return asset("uploads/courses/$course_uuid/$module_uuid/$tp");
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
