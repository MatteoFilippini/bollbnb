<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function flat(){
        return $this->belongsTo('App\Models\Flat');
    }
}
