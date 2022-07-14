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
        'photo',
        'description',
        'requirements',
        'syllabus',
        'semester_id',
    ];

    public function getPhotoAttribute(){
        return asset("assets/img/ues/".$this->attributes['photo']);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function lives()
    {
        return $this->hasMany(Live::class);
    }

    public function comments()
    {
        return $this->belongsToMany(User::class)->withPivot("comment", "created_at")->withTimestamps();
    }
}
