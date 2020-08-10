<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'show_location' => 'boolean',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    // ];

    /**
     * Get the user that owns the activity.
     */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
