<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'username', 'phone', 'role', 'avatar',
        'longitude', 'latitude', 'location',
        'provider', 'provider_id', 'access_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
        'show_location' => 'boolean',
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
     * Get the comments for the blog post.
     */
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    // public function getActivityCountAttribute(){
    //     return $this->activities()->count();
    // }

    /**
     * Get the comments for the blog post.
     */
    public function tags()
    {
        return $this->hasMany('App\ActivityTags');
    }

    // public function getTagCountAttribute(){
    //     return $this->tags()->count();
    // }
}
