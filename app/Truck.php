<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = [
        'brand_id',
        'year_of_manufacture',
        'owner_s_name_and_surname',
        'number_of_owners',
        'comments',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
