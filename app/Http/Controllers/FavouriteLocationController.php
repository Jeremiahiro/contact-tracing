<?php

namespace App\Http\Controllers;

use Auth;
use App\Activity;
use Illuminate\Http\Request;

class FavouriteLocationController extends Controller
{

    /**
     * Get all favorite posts by user
     *
     * @return Response
     */
    public function index()
    {
        $favourites = Auth::user()->favorites;

        return view('profile.favourite', compact('favourites'));
    }

    /**
     * Favorite a particular location
     *
     * @param  Post $post
     * @return Response
     */
    public function favoriteLoc(Activity $activity)
    {
        Auth::user()->favorites()->attach($activity->id);

        return back();
    }

    /**
     * Unfavorite a particular location
     *
     * @param  Post $post
     * @return Response
     */
    public function unFavoritePost(Activity $activity)
    {
        Auth::user()->favorites()->detach($activity->id);

        return back();
    }
}
