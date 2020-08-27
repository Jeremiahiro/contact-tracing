<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\FavouriteLocation;
use App\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLocationController extends Controller
{
    /**
     * Get all locations by user
     *
     * @return Response
     */
    public function index()
    {
        $locations = Auth::user()->locations;
        $favorites = Auth::user()->favorites;

        
        return view('components.locations.index', compact(['locations', 'favorites']));
    }

    /**
     * Unfavorite a particular location
     *
     * @param  Post $post
     * @return Response
     */
    public function toggleFavourite($location)
    {
        $user = Auth::user();
        $favorite = FavouriteLocation::where('location_id', $location)->where('user_id', $user->id)->first();

        if($favorite){
            $favorite->delete();

            $response = [
                'success' => true,
                "attach" => false,
                "loc" => $location,
            ];
            return response()->json($response, 201);
            
        } else {
            $favorite = new FavouriteLocation;
            $favorite->user_id = $user->id;
            $favorite->location_id = $location;
            $favorite->save();

            $response = [
                'success' => true,
                "attach" => true,
                "loc" => $location,
            ];
            return response()->json($response, 201);
        }
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserLocation  $userLocation
     * @return \Illuminate\Http\Response
     */
    public function show(UserLocation $userLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserLocation  $userLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLocation $userLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserLocation  $userLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'home_address' => 'required',
        ]);

        $user = Auth::user();

        if($request->home_address != null && $request->home_location === null){
            return redirect()->back()->with('error', 'Select a landmark location form the suggestion(s)');  
        } else if($request->office_address != null && $request->office_location === null){
            return redirect()->back()->with('error', 'Select a landmark location form the suggestion(s)');  
        } else if ($location = UserLocation::where('user_id', $user->id)->first()){
            $location->update($request->all());
            return redirect()->back()->with('success', 'Successful');
        } else {
            $location = UserLocation::where('user_id', Auth()->user()->id);
            $input = $request->all();
            $location->fill($input);
            $location->user_id = Auth::user()->id;
            $location->save();
            return redirect()->back()->with('success', 'Successful');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserLocation  $userLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLocation $userLocation)
    {
        //
    }
}
