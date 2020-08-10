<?php

use Illuminate\Support\Facades\Cookie;

if (!function_exists('is_new_user')) {

    /**
     * Check if logged in user is a super admin
     *
     * @return boolean
     */
    function is_new_user()
    {
        if (Auth::user()->first_time_login == true) {
            return true;
        }
        return false;
    }
}