<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'user_id', 'from_latitude', 'from_longitude', 'from_location',
        'to_latitude', 'to_longitude', 'to_location',
        'start_date', 'end_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * Get the user that owns the activity.
     */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the people attached to the  activity.
     */
    public function tags()
    {
        return $this->hasMany('App\ActivityTags');
    }
}
