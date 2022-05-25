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

    public function levels()
    {
        return $this->hasMany(Level::class);
    }
}
