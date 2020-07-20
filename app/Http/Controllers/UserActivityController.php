<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\UserActivity;
use App\ActivityPeople;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activites = UserActivity::where('owner_id', Auth::user()->id)->with('people')->get();
        return view('activity.index', compact(['activites']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateActivity($request);
        $activity = new UserActivity();

        $activity->from_location = $request->input('from_location');
        $activity->from_latitude = $request->input('from_latitude');
        $activity->from_longitude = $request->input('from_longitude');

        $activity->to_location = $request->input('to_location');
        $activity->to_latitude = $request->input('to_latitude');
        $activity->to_longitude = $request->input('to_longitude');

        $activity->start_date = $request->input('start_date');
        $activity->end_date = $request->input('end_date');

        $activity->owner_id = Auth::user()->id;
        $activity->save();

        $items = $request->input('people');

        foreach($items as $item) {
            $user = User::where('email', $request->input('email'))->exits();
            if(!$user){
                $people = new ActivityPeople;
                $people->name          = $item['name'];
                $people->email         = $item['email'];
                $people->phone         = $item['phone'];
                $people->activity_id   = $activity->id;
                $people->owner_id      = Auth::user()->id;
                $people->save();
            } else {
                $people = new ActivityPeople;
                $people->name          = $user->name;
                $people->email         = $user->email;
                $people->phone         = $user->phone;
                $people->activity_id   = $user->activity_id;
                $people->user_id   = $user->user_id;
                $people->owner_id      = Auth::user()->id;
                $people->save();
            }
        }

        return view('activity.index')->with('success', 'Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function show(UserActivity $userActivity)
    {
        $activity = UserActivity::where('id', $id)->with('people')->get();
        return view('activity.show', compact(['activity']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(UserActivity $userActivity)
    {
        return view('activity.edit', compact(['activity']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserActivity $userActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserActivity $userActivity)
    {
        //
    }

    public function validateActivity(Request $request){

		$rules = [
            'from_latitude' => 'required',
            'from_longitude' => 'required',
            'from_location' => 'required',
            'to_latitude' => 'required',
            'to_longitude' => 'required',
            'to_location' => 'required',
            'activity_tags.*.name' => 'sometimes',
            'activity_tags.*.email' => 'sometimes',
            'activity_tags.*.phone' => 'sometimes',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ];
         
		$this->validate($request, $rules);
    }
}
