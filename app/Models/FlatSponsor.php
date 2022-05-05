<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlatSponsor extends Model
{
     public function flat()
      {
          return $this->belongsTo('App\Models\Flat');
      }

      public function sponsor()
      {
          return $this->belongsTo('App\Models\Sponsor');
      }

    //   protected $fillable = ['sponsor_id','flat_id'];
}
