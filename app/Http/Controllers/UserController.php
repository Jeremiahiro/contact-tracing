<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use App\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $activities = Activity::where('user_id', Auth::user()->id)->latest('deleted_at')->withTrashed()->simplePaginate(10);
        $archives = Activity::where('user_id', Auth::user()->id)->where('deleted_at', '!=', null)->latest('deleted_at')->withTrashed()->simplePaginate(50);

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
    public function show($id)
    {
        $user = User::where('uuid', $id)->first();
        return view('profile.index', compact('user'));
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
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'username'  => ['string', 'max:15'],
            'phone'     => ['phone:AUTO,NG'],
            'gender'    => ['required'],
            'age_range'    => ['required'],
        ]);

        $trim_username = ltrim($request->username, '@');
        $username = '@'. $trim_username;

        try {
            $user = Auth::user();
            $user->name = $request->get('name');
            $user->username = $username;
            $user->phone = $request->get('phone');
            $user->gender = $request->get('gender');
            $user->age_range = $request->get('age_range');
            $user->save();
            return redirect()->back()->with('success', 'Successful');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'oops something went wrong');
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
    public function follow(Request $request){

        $user = User::find($request->userID);
        $response = auth()->user()->toggleFollow($user);
        if($request->status == 0){
            $status = 1;
        } else {
            $status = 0;
        }
        return response()->json(['success'=>$response, 'status' => $status]);
    }
}
