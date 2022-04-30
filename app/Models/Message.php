<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['flat_id', 'content', 'date', 'sender_mail', 'sender_name', 'square_meters', 'default_image'];

    public function flat(){
        return $this->belongsTo('App\Models\Flat');
    }
}
