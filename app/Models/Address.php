<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function flat()
    {
        return $this->belongsTo('App\Models\Flat');
    }

    protected $fillable = [
        'flat_id', 'address' , 'city', 'latitude', 'longitude', 'position'
    ];
}
