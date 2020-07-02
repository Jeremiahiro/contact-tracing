<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityPeople extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'user_id', 'activity_id', 'name',
        'email', 'phone', 'person_id',
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
     * Get the user that owns the activity people.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    /**
     * Get the activity that the people belong to.
     */
    public function activity()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
