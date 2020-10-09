<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Activity extends Model
{
    use SoftDeletes, LogsActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'start_date',
        'end_date',
        'deleted_at',
    ];

    /**
     * Get the user that owns the activity.
     */
    public function owner()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    /**
     * Get the people attached to the  activity.
     * Group by unique names
     */
    public function tags()
    {
        return $this->hasMany('App\Model\ActivityTags', 'activity_id');
    }

    /**
     * Get the people attached to the  activity.
     * Group by unique names
     */
    public function location()
    {
        return $this->belongsTo('App\Model\Location', 'location_id');
    }

    /**
     * Get the people attached to the  activity.
     * Group by unique names
     */
    public function tagging()
    {
        return $this->hasMany('App\Model\ActivityTags', 'activity_id')->groupBy('name');
    }

    /**
     * Get the people attached to the  activity.
     */
    public function tagged()
    {
        return $this->hasMany('App\Model\User', 'person_id')->orderBy('created_at');
    }

}
