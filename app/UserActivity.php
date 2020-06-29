<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    /**
     * Get the post that owns the comment.
     */
    public function activity()
    {
        return $this->belongsTo('App\User');
    }
}
