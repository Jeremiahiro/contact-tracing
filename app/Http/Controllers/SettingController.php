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
     * Show and Hide Location request.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function location(Request $request)
    {
        $user = User::where('uuid', $request->userID);
        if($user){
            $user->show_location = $request->status;
            return response()->json(['success'=>'Status change successfully.']);
        }
        return response()->json(['error'=>'oops something went wrong!']);

    }

    /**
     * Deactivate and Activate request.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deactivate(Request $request)
    {
        $user = User::where('uuid', $request->userID);
        if($user){
            $user->deactivate_acc = $request->status;
            return response()->json(['success'=>'Status change successfully.']);
        }
        return response()->json(['error'=>'oops something went wrong!']);

    }

    /** 
     * Lets a user update profile image
     * * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ]);

        $avatar = $request->file('avatar')->getRealPath();
        $upload = Cloudder::upload($avatar, null, ['folder' => 'SOP_Images']);

        if($upload){
            list($width, $height) = getimagesize($avatar);
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
            
            $user = Auth::user();
            $user->avatar = $image_url;
            $user->save();
    
            $response = [
                'success' => true,
                'img_url' => $image_url,
                "message" => 'Successful'
            ];
            return response()->json($response, 201);

        } else {
            return response()->json(['error' => 'Oops! Something went wrong.']);
        }
    }
}
