<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Activity;
use App\Model\ActivityTags;
use App\Model\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ActivityTagNotification;
use App\Notifications\ActivityTagSmsNotification;

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
        $user = Auth::user();

        $activities = Activity::with('tags')->where('user_id', $user->id)->whereDate('created_at', Carbon::today())->latest('created_at')->get();

        $istagged = Activity::whereHas('tags', function($query) use($user){
                                    $query->wherePersonId($user->id);
                                })->whereDate('created_at', Carbon::today())->latest('created_at')->get();

        if($request->ajax()){

            $sort_date = Carbon::parse($request->date)->format('Y-m-d');

            $activities = Activity::with('tags')->where('user_id', $user->id)->whereDate('created_at', $sort_date)->latest('created_at')->get();
            $istagged = Activity::whereHas('tags', function($query) use($user){
                                        $query->wherePersonId($user->id);
                                    })->whereDate('created_at', $sort_date)->latest('created_at')->get();

            return response()->json([
                'activities' => view('activity.partials.activity_list_view', compact('activities'))->render(),
                'istagged' => view('activity.partials.tagged', compact('istagged'))->render(),
                'date' => $sort_date,
                ]);
        }

      
        return view('activity.index', compact('activities', 'istagged'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $favorites = Auth::user()->getFavoriteItems(Location::class)->paginate(5);

        return view('activity.create', compact(['favorites']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO delete the script with google key from activit.create

        // dd($request->all());
        $this->validateActivity($request);

        $start = Carbon::parse($request->start_date)->format('Y-m-d H:i');
        $end = Carbon::parse($request->end_date)->format('Y-m-d H:i');

        DB::beginTransaction();

        try {

            $activity = Activity::firstOrCreate([
                'from_address' => $request->from_address,
                'from_location' => $request->from_location,
                'from_latitude' => $request->from_latitude,
                'from_longitude' => $request->from_longitude,
                'from_image' => $request->from_image,
    
                'to_address' => $request->to_address,
                'to_location' => $request->to_location,
                'to_latitude' => $request->to_latitude,
                'to_longitude' => $request->to_longitude,
                'to_image' => $request->to_image,
    
                'start_date' => $start,
                'end_date' => $end,
    
                'user_id' => auth()->user()->id,
            ]);

            if ($activity->wasRecentlyCreated) {

                $location_1 = Location::where('location', $request->from_location)->where('user_id', auth()->user()->id)->first();

                if(!$location_1){
                    $location = [
                        'address'   => $request->from_address,
                        'location'  => $request->from_location,
                        'latitude'  => $request->from_latitude,
                        'longitude' => $request->from_longitude,
                        'image'     => $request->from_image,
                    ];
                    $this->save_new_location($location);
                }

                $location_2 = Location::where('location', $request->to_location)->where('user_id', auth()->user()->id)->first();

                if(!$location_2){
                    $location = [
                        'address'   => $request->to_address,
                        'location'  => $request->to_location,
                        'latitude'  => $request->to_latitude,
                        'longitude' => $request->to_longitude,
                        'image'     => $request->to_image,
                    ];
                    $this->save_new_location($location);
                }
    
                // for existing users
                if($request->tags != null) {
                    $tags = explode(",", $request->tags);
                    foreach($tags as $person) {
                        $existingUser = User::where('username', $person)->first();
                        if ($existingUser) {
                            $data = [
                                'activity_id' => $activity->id,
                                'user'        => $existingUser,
                            ];
                            $this->save_tag_for_existing_user($data);
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
                            $data = [
                                'activity_id' => $activity->id,
                                'user'        => $existingUser,
                            ];
                            $this->save_tag_for_existing_user($data);

                        } elseif ($name[$key] != null) {
                            $data = [
                                'name'          => $name[$key],
                                'email'         => $email[$key],
                                'phone'         => $phone[$key],
                                'activity_id'   => $activity->id,
                            ];
                            $this->save_tag_for_new_user($data);
                        } 
                    }
                }
            
            } else {
                return redirect()->back()->with('error', 'Activity was recently created');
            }
            DB::commit();

            return redirect()->route('activity.index')->with('success', 'Successful!');

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->with('error', 'OOPS something went wrong');
        } 

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('activity.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('activity.edit', compact('activity'));
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
        if($activity->user_id == auth()->user()->id){

            if($request->name[0] != null || $request->tags != null)
            {
                DB::beginTransaction();
                try {
                    // for existing users
                    if($request->tags != null) {
                        $tags = explode(",", $request->tags);
                        foreach($tags as $person) {
                            $existingUser = User::where('username', $person)->first();
                            if ($existingUser) {
                                $existingTag = ActivityTags::where('person_id', $existingUser->id)->where('activity_id', $activity->id)->first();
                                if(!$existingTag){
                                    $data = [
                                        'activity_id' => $activity->id,
                                        'user'        => $existingUser,
                                    ];
                                    $this->save_tag_for_existing_user($data);
                                } 
                            } 
                        }
                    }
        
                    // for users not on the platform
                    $name = $request->name;
                    $email = $request->email;
                    $phone = $request->phone;
    
                    if($name != null) {
                        foreach($name as $key => $value) {
                            $existingUser = User::where('email', $email[$key])->first();
                            if ($existingUser) {
                                $existingTag = ActivityTags::where('person_id', $existingUser->id)->where('activity_id', $activity->id)->first();
                                if(!$existingTag){
                                    $data = [
                                        'activity_id' => $activity->id,
                                        'user'        => $existingUser,
                                    ];
                                    $this->save_tag_for_existing_user($data);
                                }
                             
                            } elseif ($name[$key] != null) {
                                $existingTag = ActivityTags::where('name', $name[$key])->where('activity_id', $activity->id)->first();
                                if(!$existingTag){
                                    $data = [
                                        'name'          => $name[$key],
                                        'email'         => $email[$key],
                                        'phone'         => $phone[$key],
                                        'activity_id'   => $activity->id,
                                    ];
                                    $this->save_tag_for_new_user($data);
                                }
                            }
                        }
                    }
                    DB::commit();
                    return redirect()->route('activity.index')->with('success', 'Activity Updated Successfuly!');
    
                } catch (\Throwable $th) {
                    DB::rollBack();
                    dd($th);
                    return redirect()->back()->with('error', 'OOps something went wrong');
                } 
            } else {
                return redirect()->back()->with('error', 'Entry fields cannot be null');
            }
        }
        return redirect()->back()->with('info', 'Unauthorized Access!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $activity = Activity::withTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success', 'Successful');
    }

    /**
     * Archive activity using softDelete.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function archive(Request $request, $id)
    {
        $activity = Activity::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Successful');
    }

    /**
     * Unarchive activity using softDelete.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function unarchive(Request $request, $id)
    {
        $activity = Activity::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Successful');
    }

    public function validateActivity(Request $request)
    {

		$rules = [
            'from_latitude' => 'required',
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

     /**
     * Show the search page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function calendar()
    {
        return view('activity.calendar');
    }

    public function save_tag_for_existing_user($data)
    {
        $activityTag = new ActivityTags;
        $activityTag->activity_id   = $data['activity_id'];
        $activityTag->person_id     = $data['user']->id;
        $activityTag->name          = $data['user']->name;
        $activityTag->user_id       = Auth::user()->id;
        $activityTag->save();

        // initiate notification
        $details = [
            'greeting' => 'Hi ' . $data['user']->name,
            'body' => 'You were tagged in an activity',
            'action' => 'click here to see',
            'activity_id' => $data['activity_id'],
        ];
        $activityTag->notify(new ActivityTagNotification($details));
        // $data['user']->notify(new ActivityTagNwotification($details));

    }

    public function save_tag_for_new_user($data)
    {
        $activityTag = new ActivityTags;
        $activityTag->activity_id   = $data['activity_id'];
        $activityTag->name          = $data['name'];
        $activityTag->email         = $data['email'];
        $activityTag->phone         = $data['phone'];
        $activityTag->user_id       = Auth::user()->id;
        $activityTag->save();

        // initiate notification
        $details = [
            'greeting' => 'Hi ' . $data['name'],
            'body' => 'You were tagged in an activity',
            'action' => 'click here to see',
            'activity_id' => $data['activity_id'],
        ];

        if($data['email'] != null){
            $activityTag->notify(new ActivityTagNotification($details));
        } elseif($data['phone'] != null) {
            $activityTag->notify(new ActivityTagSmsNotification($details));
        }
    }

    public function save_new_location($location)
    {
        $loc = new Location;
        $loc->address      = $location['address'];
        $loc->location     = $location['location'];
        $loc->latitude     = $location['latitude'];
        $loc->longitude    = $location['longitude'];
        $loc->image        = $location['image'];
        $loc->user_id      = Auth::user()->id;
        $loc->save();
    }
}
