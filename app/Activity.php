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
        'user_id', 
        'from_latitude', 'from_longitude', 'from_address', 'from_location',
        'to_address', 'to_latitude', 'to_longitude', 'to_location',
        'start_date', 'end_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'start_date',
        'end_date',
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
     * Group by unique names
     */
    public function tags()
    {
        return $this->hasMany('App\ActivityTags', 'activity_id');
    }

    /**
     * Get the people attached to the  activity.
     * Group by unique names
     */
    public function tagging()
    {
        return $this->hasMany('App\ActivityTags', 'activity_id')->groupBy('name');
    }

    /**
     * Get the people attached to the  activity.
     */
    public function tagged()
    {
        return $this->hasMany('App\User', 'person_id')->orderBy('created_at');
    }

    // /**
    //  * Get the people attached to the  activity.
    //  */
    // public function calender($query)
    // {
    //     return $this->where('created_at', $query)->orderBy('created_at');
    // }
}
