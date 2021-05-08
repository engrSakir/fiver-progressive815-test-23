<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name'
    ];

    public function trucks(){
        return $this->hasMany(Truck::class, 'brand_id', 'id');
    }
}
