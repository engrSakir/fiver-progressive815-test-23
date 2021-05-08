<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = [
        'auto_brand',
        'year_of_manufacture',
        'owner_s_name_and_surname',
        'number_of_owners',
        'comments',
    ];
}
