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
        return redirect()->route('activity.create')->with('info', 'You need to add an Activity!');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::where('id', '!=', auth()->id())->pluck('username');
        // $data = response()->json($users['content']);
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

        $activity = Activity::firstOrCreate([
            'from_address' => $request->from_address,
            'from_location' => $request->from_location,
            'from_latitude' => $request->from_latitude,
            'from_longitude' => $request->from_longitude,

            'to_address' => $request->to_address,
            'to_location' => $request->to_location,
            'to_latitude' => $request->to_latitude,
            'to_longitude' => $request->to_longitude,

            'start_date' => $request->start_date,
            'end_date' => $request->end_date,

            'user_id' => auth()->user()->id,
        ]);

        if ($activity->wasRecentlyCreated) {
            // for existing users
            if($request->tags != null) {
                $tags = explode(",", $request->tags);
                foreach($tags as $person) {
                    $existingUser = User::where('name', 'LIKE', $person.'%')
                            ->orWhere('username', 'LIKE', $person.'%')
                            ->first();
                    if ($existingUser) {
                        $activityTag = new ActivityTags;
                        $activityTag->activity_id   = $activity->id;
                        $activityTag->person_id     = $existingUser->id;
                        $activityTag->user_id       = Auth::user()->id;
                        $activityTag->save();
                    } 
                }
            } 

            // for users not on the platform
            if($request->name != null) {
                $name = $request->name;
                $email = $request->email;
                $phone = $request->phone;

                foreach($name as $key => $value) {
                    $existingUser = User::where('email', $email[$key])->first();
                    if ($existingUser) {
                        $activityTag = new ActivityTags;
                        $activityTag->activity_id   = $activity->id;
                        $activityTag->person_id     = $existingUser->id;
                        $activityTag->user_id       = Auth::user()->id;
                        $activityTag->save();
                    } elseif ($name[$key] != null) {
                        $activityTag = new ActivityTags;
                        $activityTag->name          = $name[$key];
                        $activityTag->email         = $email[$key];
                        $activityTag->phone         = $phone[$key];
                        $activityTag->activity_id   = $activity->id;
                        $activityTag->user_id       = Auth::user()->id;
                        $activityTag->save();
                    } 
                }
            }
        
        } else {
            return redirect()->back()->with('error', 'Activity was recently created');
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
            'from_latitude' => 'required',
            'from_latitude' => 'required',
            'to_location' => 'required',
            'to_latitude' => 'required',
            'to_latitude' => 'required',
            'activity_tags.*.name' => 'sometimes',
            'activity_tags.*.email' => 'sometimes',
            'activity_tags.*.phone' => 'sometimes',
        ];

        $messages = [
            'from_latitude' => 'Select location from the menu',
            'to_latitude' => 'Select location from the menu',
        ];
         
		$this->validate($request, $rules, $messages);
    }
}
