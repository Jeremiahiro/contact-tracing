<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Location extends Model
{
    use Favoriteable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Get the user that owns the activity.
     */
    public function owner()
    {
        return $this->belongsTo('App\Model\User');
    }
}
