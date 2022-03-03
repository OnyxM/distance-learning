<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'date_naissance',
        'lieu_naissance',
        'photo',
        'priority',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const USER_PRIORITY = ['user' => '0', 'manager' => '2', 'admin' => '3'];

    protected $appends = [
        'name',
    ];

    public function getNameAttribute(){
        return ucwords($this->firstname." ".$this->lastname);
    }

    public function getPhotoAttribute(){
        return asset("assets/img/".$this->attributes['photo']);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
