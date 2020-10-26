<?php

namespace App\Http\Controllers;

use Cloudder;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        
        $validator = Validator::make($request->all(), [
            'current_password' => 'sometimes',
            'password'  => 'required|string|min:8|different:current_password|confirmed|regex:/(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
        ]);

        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => 'Incorrect Password',
            ];
            $statusCode = 422;
            return response()->json($response, $statusCode);
        }

        $current_password = $request->input('current_password');
        $password = $request->input('password');

        if($user->password === null && $current_password === null){
            $user->password = Hash::make($password);
            $user->save();

            $response = [
                'success' => true,
                'message' => 'Successful',
            ];
            $statusCode = 201;
            return response()->json($response, $statusCode);

            // return redirect()->back()->with('success', 'Successful');  
        } elseif ($current_password != null) {
            $passwordCheck = Hash::check($current_password, $user->password);
            if($passwordCheck) {
                $user->password = Hash::make($password);
                $user->save();

                $response = [
                    'success' => true,
                    'message' => 'Successful',
                ];
                $statusCode = 201;
                // return redirect()->back()->with('success', 'Successful');  
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Current Password is not correct',
                ];
                $statusCode = 422;
            }

            return response()->json($response, $statusCode);
        }
        $response = [
            'success' => false,
            'message' => 'Current Password is not correct',
        ];
        $statusCode = 422;
        return response()->json($response, $statusCode);

    }

    /**
     * Toggle background activity.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function backgroundActivity(Request $request)
    {
        $user = Auth::user();
        $user->background_activity = $request->status;
        $user->save();

        $response = [
            'success' => true,
            "message" => 'Successful'
        ];
        return response()->json($response, 201);
    }

    // /**
    //  * Toggle background activity.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function toggleNotification(Request $request)
    // {
    //     $user = Auth::user();
    //     $user->background_activity = $request->status;
    //     $user->save();

    //     $response = [
    //         'success' => true,
    //         "message" => 'Successful'
    //     ];
    //     return response()->json($response, 201);
    // }

    
    /**
     * Deactivate and Activate request.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deactivateAccount()
    {
        $user = Auth::user();
        $user->status = 0;

        Auth::logout();

        return redirect()->route('home');

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
     * Lets a user upload image
     * * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,bmp,jpg,png|between:1,6000',
        ]);

        if($request->ajax()) {

            $image = $request->file('image')->getRealPath();
            $upload = Cloudder::upload($image, null, ['folder' => 'SOP_Pictures']);
    
            if($upload){
                list($width, $height) = getimagesize($image);
                $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                
                if($request->type == 'header_image'){
                    $this->saveHeader($request, $image_url);
                } else if($request->type == 'profile_image'){
                    $this->saveAvatar($request, $image_url);
                }
        
                $response = [
                    'success' => true,
                    "message" => 'Successful',
                    "image_url" => $image_url
                ];
                return response()->json($response, 201);
    
            } else {
                $response = [
                    'success' => false,
                    "message" => 'Unsupported Image Size or Format',
                ];
                return response()->json($response, 422);
            }

        }

    }

    public function saveAvatar(Request $request, $image_url)
    {
        $user = Auth::user();
        $user->avatar = $image_url;
        $user->save();
    }

    public function saveHeader(Request $request, $image_url)
    {
        $user = Auth::user();
        $user->header = $image_url;
        $user->save();
    }

        /** 
     * Lets a user destryo image
     * * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function destroyImage(Request $request)
    {
        
        if($request->ajax()) {

            Cloudder::delete($request->image_url, null);

            $response = [
                'success' => true,
                "message" => 'Successful',
            ];
            return response()->json($response, 201);

        }

    }
}
