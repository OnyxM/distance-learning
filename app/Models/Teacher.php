<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'name',
        'poste',
        'user_id',
    ];

    protected $appends=['fullname'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ues()
    {
        return $this->belongsToMany(Ue::class);
    }

    public function getFullnameAttribute()
    {
        return ucwords($this->title.". ".$this->name);
    }
}
