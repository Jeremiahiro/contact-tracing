<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\FollowNotification;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $activities = Activity::where('user_id', $user->id)->latest()->simplePaginate(10);
        $archives = Activity::where('user_id', $user->id)->where('deleted_at', '!=', null)->latest('deleted_at')->withTrashed()->simplePaginate(50);

        if ($request->ajax()) {
            $activities = view('profile.activity', compact('activities'))->render();
            return response()->json(['html'=>$activities]);
        }
        return view('profile.index', compact('user', 'activities', 'archives'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = User::where('uuid', $id)->first();

        $activities = Activity::where('user_id', $user->id)->latest()->simplePaginate(10);
        $archives = Activity::where('user_id', $user->id)->where('deleted_at', '!=', null)->latest('deleted_at')->withTrashed()->simplePaginate(50);

        if ($request->ajax()) {
            $activities = view('profile.activity', compact('activities'))->render();
            return response()->json(['html'=>$activities]);
        }
        return view('profile.index', compact('user', 'activities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('uuid', $id)->first();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:50',
            'username'  => 'required|string|max:15|min:3',
            'phone'     => 'required|phone:AUTO,NG',
            'gender'    => 'required',
            'age_range' => 'required',
        ]);

        $trim_username = ltrim($request->username, '@');
        $username = '@'. $trim_username;

        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => 'Incorrect Form Values',
            ];
            return response()->json($response, 422);
        }

        try {

            $user = Auth::user();
            $user->name = $request->name;
            $user->username = $username;
            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->age_range = $request->age_range;
            $user->save();

            $response = [
                'success' => true,
                'message' => 'Successful',
            ];
            return response()->json($response, 201);
            // return redirect()->back()->with('success', 'Successful');

        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => 'OOPS! Something went wrong',
            ];

            return response()->json($response, 422);
            // return redirect()->back()->with('error', 'oops something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     /**
     * follow and unfollow request.
     *
     * @return Illuminate\Http\Request;
     * @use Overtrue\LaravelFollow\Followable;
     * 
     */
    public function follow(Request $request)
    {
        $follow_user = User::find($request->userID);

        if(auth()->user()->isFollowing($follow_user)){
            auth()->user()->unfollow($follow_user);
            $followers_count = Auth::user()->followers()->count();
            $followings_count = Auth::user()->followings()->count();

            $response = [
                'success' => true,
                "attach" => false,
                "followers_count" => $followers_count,
                "followings_count" => $followings_count,
            ];
            return response()->json($response, 201);
            
        } else {
            auth()->user()->follow($follow_user);

            $followers_count = Auth::user()->followers()->count();
            $followings_count = Auth::user()->followings()->count();

            $details = [
                'greeting' => 'Hi Artisan',
                'body' => 'is followng you',
                'follower_id' => auth()->user()->id,
            ];
            $follow_user->notify(new FollowNotification($details));

            $response = [
                'success' => true,
                "attach" => true,
                "followers_count" => $followers_count,
                "followings_count" => $followings_count,
            ];
            return response()->json($response, 201);
        }
    }

    public function anonymizeAGroupOfUsers() {
    	$users = User::where('last_activity', '<=', carbon::now()->submonths(config('gdpr.settings.ttl')))->get();
    	foreach ($users as $user) {
            $user->anonymize();
        }
    }

    /** 
     * Ajax autoload
     * followers
     */
    public function followers(Request $request)
    {
        $followers = Auth::user()->followers()->paginate(50);

        if ($request->ajax()) {
            $followers = view('components.follow.parials.followers_data', compact('followers'))->render();
            return response()->json([
                'followers' => $followers,
                ]);
        }
        return view('components.follow.followers', compact(['followers']));
    }

    /** 
     * Ajax autoload
     * followings
     */
    public function followings(Request $request)
    {
        $followings = Auth::user()->followings()->paginate(50);

        if ($request->ajax()) {
            $followings = view('components.follow.parials.followings_data', compact('followings'))->render();
            return response()->json([
                'followings' => $followings,
                ]);
        }
        return view('components.follow.followings', compact(['followings']));
    }
}
