<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'content',
        'uuid',
        'module_id'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
