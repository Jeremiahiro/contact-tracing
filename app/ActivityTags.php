<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ActivityTags extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'user_id', 'activity_id', 'name',
        'email', 'phone', 'person_id', 'avatar',
    ];

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
        return $this->belongsTo('App\User',);
    }

    /**
     * Get the activity that the people belong to.
     */
    public function activity()
    {
        return $this->belongsTo('App\Activity', 'activity_id');
    }

    /**
     * Get the activity that the people belong to.
     */
    public function tagged()
    {
        return $this->belongsTo('App\User', 'person_id');
    }

    /**
     * Get the activity that the people belong to.
     */
    public function tagging()
    {
        return $this->belongsTo('App\Activity', 'user_id');
    }
}
