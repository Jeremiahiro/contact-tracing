<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Activity;
use App\ActivityTags;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = DB::table("users")->count();
        // $user = User::where('id', Auth::user()->id);    
        // $activity = Activity::where('user_id', Auth::user()->id);
        // $tag = ActivityTags::where('user_id', Auth::user()->id);
        return view('homepage.index', compact('count'));
    }

}
