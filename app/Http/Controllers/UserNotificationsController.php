<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Activity;
use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show(Request $request)
    {
        $notifications = auth()->user()->notifications;
        auth()->user()->unreadNotifications->markAsRead();
        $users = User::get();
        $activities = Activity::get();

        return view('components.notification.show', compact('notifications', 'users', 'activities'));
    }
}
