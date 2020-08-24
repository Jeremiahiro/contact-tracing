<?php

namespace App;

use Auth;
use App\FavouriteLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;
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
        'deleted_at',
    ];

    /**
     * Get the user that owns the activity.
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
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

    /**
     * Determine whether a post has been marked as favorite by a user.
     *
     * @return boolean
     */
    public function favorited()
    {
        return (bool) FavouriteLocation::where('user_id', Auth::id())
                            ->where('activity_id', $this->id)
                            ->first();
    }

}
