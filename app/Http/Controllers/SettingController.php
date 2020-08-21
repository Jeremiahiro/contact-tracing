<?php

namespace App\Http\Controllers;

use Cloudder;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    
    /**
     * Show the view for upating setting for the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setting($id)
    {
        $user = User::where('uuid', $id)->first();
        return view('profile.setting', compact('user'));
    }

    public function skipWalkthrough()
    {
        $user = Auth::user();
        if ($user->first_time_login != true) {
            $user->first_time_login = 1; 
            $user->save();
            return response()->json(['response' => 'success'], 201);
        }
        $user->first_time_login = 0; 
        $user->save();
        return response()->json(['response' => 'updated'], 201);

    }


    // public function  ()
    // {
    //     if (Auth::user()->first_time_login) {
    //         $first_time_login = true;
    //         Auth::user()->first_time_login = false;
    //         Auth::user()->save();
    //     } else {
    //         $first_time_login = false;
    //     }

    //     return view(
    //         'activity.create', 
    //         ['first_time_login' => $first_time_login]
    //     ); 
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'current_password' => 'sometimes',
            'password'  => 'required|string|min:8|different:current_password|confirmed|regex:/(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
        ]);

        $current_password = $request->input('current_password');
        $password = $request->input('password');

        if($user->password === null && $current_password === null){
            $user->password = Hash::make($password);
            $user->save();
            return redirect()->back()->with('success', 'Successful');  
        } elseif ($current_password != null) {
            $passwordCheck = Hash::check($current_password, $user->password);
            if($passwordCheck) {
                $user->password = Hash::make($password);
                $user->save();
                return redirect()->back()->with('success', 'Successful');  
            } else {
                return redirect()->back()->with('error', 'Current Password is not correct');  
            }
        }
        return redirect()->back()->with('error', 'Current Password is required');  

    }

    /**
     * Deactivate and Activate request.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deactivate(Request $request)
    {
        $user = Auth::user();
        $user->status = $request->status;
        $user->save();

        $response = [
            'success' => true,
            "message" => 'Successful'
        ];
        return response()->json($response, 201);
    }

    /** 
     * Lets a user update profile image
     * * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,bmp,jpg,png|between:1,6000',
        ]);

        $avatar = $request->file('avatar')->getRealPath();
        $upload = Cloudder::upload($avatar, null, ['folder' => 'SOP_Profile_Pictures']);

        if($upload){
            list($width, $height) = getimagesize($avatar);
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
            
            $user = Auth::user();
            $user->avatar = $image_url;
            $user->save();
    
            $response = [
                'success' => true,
                "message" => 'Successful'
            ];
            return response()->json($response, 201);

        } else {
            return response()->json(['error' => 'Oops! Something went wrong.']);
        }
    }

    /** 
     * Lets a user update profile header image
     * * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function uploadHeader(Request $request)
    {
        $request->validate([
            'header' => 'required|image|mimes:jpeg,bmp,jpg,png|between:1,6000',
        ]);

        $header = $request->file('header')->getRealPath();
        $upload = Cloudder::upload($header, null, ['folder' => 'SOP_Header_Pictures']);

        if($upload){
            list($width, $height) = getimagesize($header);
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
            
            $user = Auth::user();
            $user->header = $image_url;
            $user->save();
    
            $response = [
                'success' => true,
                "message" => 'Successful'
            ];
            return response()->json($response, 201);

        } else {
            return response()->json(['error' => 'Oops! Something went wrong.']);
        }
    }
}
