<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class ActivityTags extends Model
{
    use Notifiable, LogsActivity;


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
    protected $casts = [ ];

    /**
     * Get the user that owns the activity people.
     */
    public function owner()
    {
        return $this->belongsTo('App\Model\User',);
    }

    /**
     * Get the activity that the people belong to.
     */
    public function activity()
    {
        return $this->belongsTo('App\Model\Activity', 'activity_id');
    }

    /**
     * Get the activity that the people belong to.
     */
    public function tagged()
    {
        return $this->belongsTo('App\Model\User', 'person_id');
    }

    /**
     * Get the activity that the people belong to.
     */
    public function tagging()
    {
        return $this->belongsTo('App\Model\Activity', 'user_id');
    }
}
