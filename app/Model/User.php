<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Followable;
use Overtrue\LaravelFavorite\Traits\Favoriter;
use Dialect\Gdpr\Portable;
use Dialect\Gdpr\Anonymizable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable implements MustVerifyEmail
{
    use Followable, Notifiable, Portable, Anonymizable, Favoriter, HasApiTokens, LogsActivity;

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
        'first_time_login' => 'boolean',
        'show_location' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
        'show_location' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    protected $gdprWith = ['location'];

    /**
     * Using the default string from config.
     */
    protected $gdprAnonymizableFields = [
        'name', 
        'email'
    ];

    /**
    * Using getAnonymized{column} to return anonymizable data
    */
    public function getAnonymizedEmail()
    {
        return random_bytes(10);
    }

    /**
     * User has many activities
     */
    public function locations()
    {
        return $this->hasMany('App\Model\Location')->orderBy('address', 'ASC');
    }    

    /**
     * User has many activities
     */
    public function activities()
    {
        return $this->hasMany('App\Model\Activity');
    }

    /**
     * User has many activities
     */
    public function distinctActivity()
    {
        return $this->hasMany('App\Model\Activity')->distinct('from_address');
    }


    /**
     * User has many tags
     */
    public function distinctTag()
    {
        return $this->hasMany('App\Model\ActivityTags')->distinct('name');
    }

    /**
     * Get the GDPR compliant data portability array for the model.
     *
     * @return array
     */
    public function toPortableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    /**
     * The attributes that should be hidden for the downloadable data.
     *
     * @var array
     */
    protected $gdprHidden = ['password'];

    /**
     * a user has many taggs.
     * 
     */
    public function tags()
    {
        return $this->hasMany('App\Model\ActivityTags');
    }

    /**
     * a user has many taggs.
     * 
     */
    public function tagging()
    {
        return $this->hasMany('App\Model\ActivityTags', 'user_id')->groupBy('name');
    }

    /**
     * a user can be tagged.
     */
    public function isTagged()
    {
        return $this->hasMany('App\Model\ActivityTags', 'person_id');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model|int $user
     *
     * @return bool
     */
    public function isPerson()
    {
        return $this->hasMany('App\Model\ActivityTags', 'person_id');
    }

    
    /**
     * Route notifications for the Nexmo channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForNexmo($notification)
    {
        return '08136478020';
        // return $this->phone_number;
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate();
        });
    }


}
