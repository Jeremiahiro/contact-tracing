<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Followable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Followable, Notifiable;

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
    protected $hidden = [
        'password', 'remember_token',
        'show_location' => 'boolean',
        'first_time_login' => 'boolean',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User has many activities
     */
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
    
    /**
     * a user has many taggs.
     * 
     */
    public function tags()
    {
        return $this->hasMany('App\ActivityTags');
    }

    /**
     * a user has many taggs.
     * 
     */
    public function tagging()
    {
        return $this->hasMany('App\ActivityTags')->groupBy('name');
    }

    /**
     * a user can be tagged.
     */
    public function isTagged()
    {
        return $this->hasMany('App\ActivityTags', 'person_id');
    }

    /**
     * user has a location
     */
    public function location()
    {
        return $this->hasOne('App\UserLocation', 'user_id');
    }

}
