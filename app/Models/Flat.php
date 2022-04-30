<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Flat extends Model implements Viewable
{

    use InteractsWithViews;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }

    //  public function sponsors()
    //  {
    //      return $this->belongsToMany('App\Models\Sponsor');
    //  }

     public function flat_sponsors()
      {
          return $this->hasMany('App\Models\FlatSponsor');
      }

    protected $fillable = ['user_id', 'title', 'rooms', 'beds', 'bathrooms', 'square_meters', 'default_image'];
}
