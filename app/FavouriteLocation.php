<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavouriteLocation extends Model
{
    /**
     * Get all of favorite posts for the user.
     */
    public function favorites()
    {
        return $this->belongsToMany('App\UserLocations', 'favourite_locations', 'user_id', 'location_id')->withTimeStamps();
    }

     /**
     * Get all of favorite posts for the user.
     */
    public function location()
    {
        return $this->belongsTo('App\UserLocation', 'location_id');
    }
   
}
