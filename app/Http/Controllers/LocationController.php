<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locations = Location::where('user_id', Auth::user()->id)->orderBy('address', 'ASC')->simplePaginate(100);

        $favorites = Auth::user()->getFavoriteItems(Location::class)->paginate(5);

        if ($request->ajax()) {
            $favorites = view('components.locations.partials.favorites', compact('favorites'))->render();
            return response()->json([
                'favorites' => $favorites,
                ]);
        }

        if(count($locations) > 0) {
            return view('components.locations.index', compact(['locations', 'favorites']));
        }
        return redirect()->route('activity.create')->with('info', 'Add an Activity');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function show(Location $locations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $locations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $locations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $locations)
    {
        //
    }

    /**
     * Favourite or Unfavorite a particular location
     *
     * @param  Post $post
     * @return Response
     */
    public function toggleFavourite($location)
    {
        $user = User::find(auth()->user()->id);
        $location_id = Location::find($location);
        
        if($user->hasFavorited($location_id)){
            $user->unfavorite($location_id);
            $response = [
                'success' => true,
                "attach" => false,
                "loc" => $location,
            ];
            return response()->json($response, 201);
            
        } else {
            $user->favorite($location_id);
            $response = [
                'success' => true,
                "attach" => true,
                "loc" => $location,
            ];
            return response()->json($response, 201);
        }
    }

    /**
     * Show and Hide Location request.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function locationVisibility(Request $request)
    {
        $user = Auth::user();
        $user->show_location = $request->status;
        $user->save();

        $response = [
            'success' => true,
            "message" => 'Successful'
        ];
        return response()->json($response, 201);
   
    }

}
