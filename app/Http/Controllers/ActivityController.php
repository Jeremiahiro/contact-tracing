<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\ActivityTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activities = Activity::where('user_id', Auth::user()->id)->latest('updated_at')->with('tags')->simplePaginate(50);
        $users = User::get();

        if($activities->count() > 0) {
            if ($request->ajax()) {
                $activities = view('activity.index', compact('activities'))->render();
                return response()->json(['html'=>$activities]);
            }
    
            return view('activity.index', compact('activities', 'users'));
        }
        return view('activity.create');

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

        $date = $request->input('date_range');
        $split = explode(' to ',$date);
        $start_date = $split[0];
        $end_date = $split[1];

        $activity = new Activity();
        $activity->from_location = $request->input('from_location');
        $activity->from_latitude = $request->input('from_latitude');
        $activity->from_longitude = $request->input('from_longitude');
        $activity->to_location = $request->input('to_location');
        $activity->to_latitude = $request->input('to_latitude');
        $activity->to_longitude = $request->input('to_longitude');
        $activity->start_date = $start_date;
        $activity->end_date = $end_date;
        $activity->user_id = Auth::user()->id;
        $activity->save();

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');

        foreach($name as $key => $value) {
            $user = User::where('email', $email[$key])->first();
            if ($user) {
                $activityTag = new ActivityTags;
                $activityTag->name          = $user->name;
                $activityTag->email         = $user->email;
                $activityTag->phone         = $user->phone;
                $activityTag->activity_id   = $activity->id;
                $activityTag->person_id     = $user->id;
                $activityTag->user_id       = Auth::user()->id;
                $activityTag->save();
            } else {
                $activityTag = new ActivityTags;
                $activityTag->name          = $name[$key];
                $activityTag->email         = $email[$key];
                $activityTag->phone         = $phone[$key];
                $activityTag->activity_id   = $activity->id;
                $activityTag->user_id       = Auth::user()->id;
                $activityTag->save();
            }
        }
        return redirect()->route('activity.index')->with('success', 'Successful!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }

    public function validateActivity(Request $request){

		$rules = [
            'from_location' => 'required',
            'to_location' => 'required',
            'activity_tags.*.name' => 'sometimes',
            'activity_tags.*.email' => 'sometimes',
            'activity_tags.*.phone' => 'sometimes',
        ];
         
		$this->validate($request, $rules);
    }
}
