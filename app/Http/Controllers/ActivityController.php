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

        $this->validateActivity($request);

        $user = Auth::user();
        $start = Carbon::parse($request->start_date)->format('Y-m-d H:i');
        $end = Carbon::parse($request->end_date)->format('Y-m-d H:i');

        DB::beginTransaction();

        try {

            $location = Location::where('address', $request->address)->where('user_id', $user->id)->first();

            if(!$location){
                $location = [
                    'address'   => $request->address,
                    'street'    => $request->street,
                    'latitude'  => $request->latitude,
                    'longitude' => $request->longitude,
                    'city'      => $request->city,
                    'state'     => $request->state,
                    'country'   => $request->country,
                    'image'     => $request->image,
                    'user_id'   => $user->id,
                ];

                $location = $this->save_new_location($location);
            }


            $activity = Activity::firstOrCreate([
                'location_id'   => $location->id,
                'start_date'    => $start,
                'end_date'      => $end,
                'user_id'       => $user->id
            ]);

            if ($activity->wasRecentlyCreated) {
                // for existing users
                if($request->tags != null) {
                    $tags = explode(",", $request->tags);
                    foreach($tags as $person) {
                        $existingUser = User::where('username', $person)->first();
                        if ($existingUser) {
                            $data = [
                                'name'          => $existingUser->name,
                                'email'         => $existingUser->email,
                                'phone'         => $existingUser->phone,
                                'person_id'     => $existingUser->id,
                                'activity_id'   => $activity->id,
                                'type'          => 'old_user',
                            ];
                            $this->save_tag_for_user($data);
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
                                'name'          => $existingUser->name,
                                'email'         => $existingUser->email,
                                'phone'         => $existingUser->phone,
                                'person_id'     => $existingUser->id,
                                'activity_id'   => $activity->id,
                                'type'          => 'old_user',
                            ];
                            $this->save_tag_for_user($data);


                        } elseif ($name[$key] != null) {
                            $data = [
                                'name'          => $name[$key],
                                'email'         => $email[$key],
                                'phone'         => $phone[$key],
                                'activity_id'   => $activity->id,
                                'type'          => 'new_user',
                            ];
                            $this->save_tag_for_user($data);
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
                                $data = [
                                    'name'          => $existingUser->name,
                                    'email'         => $existingUser->email,
                                    'phone'         => $existingUser->phone,
                                    'person_id'     => $existingUser->id,
                                    'activity_id'   => $activity->id,
                                    'type'          => 'old_user',
                                ];
                                $this->save_tag_for_user($data);
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
                                    'name'          => $existingUser->name,
                                    'email'         => $existingUser->email,
                                    'phone'         => $existingUser->phone,
                                    'person_id'     => $existingUser->id,
                                    'activity_id'   => $activity->id,
                                    'type'          => 'old_user',
                                ];
                                $this->save_tag_for_user($data);


                            } elseif ($name[$key] != null) {
                                $data = [
                                    'name'          => $name[$key],
                                    'email'         => $email[$key],
                                    'phone'         => $phone[$key],
                                    'activity_id'   => $activity->id,
                                    'type'          => 'new_user',
                                ];
                                $this->save_tag_for_user($data);
                            } 
                        }
                    }

                    DB::commit();
                    return redirect()->route('activity.index')->with('success', 'Activity Updated Successfuly!');
    
                } catch (\Throwable $th) {
                    DB::rollBack();
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
            'latitude' => 'required',
            'activity_tags.*.name' => 'sometimes',
            'activity_tags.*.email' => 'sometimes',
            'activity_tags.*.phone' => 'sometimes',
        ];

        $messages = [
            'latitude' => 'Select location from the menu',
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

    public function save_tag_for_user($data)
    {
        $activityTag = new ActivityTags;
        $activityTag->activity_id   = $data['activity_id'];
        $activityTag->name          = $data['name'];
        $activityTag->email         = $data['email'];
        $activityTag->phone         = $data['phone'];
        if($data['type'] == 'old_user'){
            $activityTag->person_id     = $data['person_id'];
        }
        $activityTag->user_id       = Auth::user()->id;
        $activityTag->save();

        // initiate notification details
        $details = [
            'greeting' => 'Hi ' . $data['name'],
            'body' => 'You were tagged in an activity',
            'action' => 'click here to see',
            'activity_id' => $data['activity_id'],
        ];

        // notification for old users
        if($data['type'] == 'old_user'){
            $activityTag->notify(new ActivityTagNotification($details));
        } else {

            // notification for new users
            if($data['email'] != null){
                $activityTag->notify(new ActivityTagNotification($details));
            } elseif($data['phone'] != null) {
                $activityTag->notify(new ActivityTagSmsNotification($details));
            }
        }
    }

    public function save_new_location($location)
    {
        $new_location               = new Location;
        $new_location->address      = $location['address'];
        $new_location->latitude     = $location['latitude'];
        $new_location->longitude    = $location['longitude'];
        $new_location->street       = $location['street'];
        $new_location->city         = $location['city'];
        $new_location->state        = $location['state'];
        $new_location->country      = $location['country'];
        $new_location->image        = $location['image'];
        $new_location->user_id      = $location['user_id'];
        $new_location->save();

        return $new_location;
    }
}
