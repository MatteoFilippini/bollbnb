<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function address(){
        return $this->hasOne('App\Models\Address');
    }

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

    public function images(){
        return $this->hasMany('App\Models\Image');
    }

    public function services(){
        return $this->belongsToMany('App\Models\Service');
    }

    public function sponsors(){
        return $this->belongsToMany('App\Models\Sponsor');
    }
}
