<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
