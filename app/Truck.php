<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = [
        'title',
        'writer_id',
        'is_active',
        'description',
        'image',
        'slug'
    ];
}
