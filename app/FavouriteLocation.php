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
        return $this->belongsToMany('App\Activity', 'favourite_locations', 'user_id', 'activity_id')->withTimeStamps();
    }
}
