<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function flat(){
        return $this->belongTo('App\Models\Flat');
    }
}
