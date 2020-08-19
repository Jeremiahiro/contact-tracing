<?php

use Illuminate\Support\Facades\Cookie;

    /**
     * Check if new user
     *
     * @return boolean
     */
    function is_new_user()
    {
        if (Auth::user()->first_time_login == 0) {
            return true;
        }
        return false;
    }
    /**
     * Check if user is active
     *
     * @return boolean
     */
    function is_active()
    {
        if (Auth::user()->status == true) {
            return true;
        }
        return false;
    }
