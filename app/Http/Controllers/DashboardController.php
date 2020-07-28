<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    /**
     * Show a users settings page.
     *
     */
    public function userSettings()
    {
        // dd('here');
        $user = Auth::user();
        return view('profile.setting', compact('user'));
    }

    /**
     * Show user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        return view('profile.index', compact('user'));
    }

    /**
     * follow and unfollow request.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function follwUserRequest(Request $request){

        $user = User::find($request->userID);
        $response = auth()->user()->toggleFollow($user);
        if($request->status == 0){
            $status = 1;
        } else {
            $status = 0;
        }
        return response()->json(['success'=>$response, 'status' => $status]);
    }

     /**
     * Deactivate and Activate request.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function ProfileChangeStatus(Request $request){

        $user = User::find($request->userID);
        if($user){
            // $user->status = $request->status;
            return response()->json(['success'=>'Status change successfully.']);
        }
        return response()->json(['error'=>'oops something went wrong!']);


    }
}
