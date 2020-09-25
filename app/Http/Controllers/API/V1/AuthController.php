<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Model\User;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|regex:/(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            'phone' => 'phone:AUTO,NG'
        ]);

        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json($response, 422); 
        }

        DB::beginTransaction();
        try {
            //code...

            $name = $data['name'];
            $string = substr($name, 0, 5);
            $randomDigit = rand(10,99);
    
            $username = '@'.$string.$randomDigit;

            $user = User::create([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'phone'     => $data['phone'],
                'password'  => Hash::make($data['password']),
                'username'  => $username,
                'avatar'    =>  'https://res.cloudinary.com/iro/image/upload/v1581499532/Profile_Pictures/wzoe4az0cg6lm7idfocb.png',
            ]);

            $accessToken = $user->createToken('authToken')->accessToken;

            DB::commit(); 
            return response([
                'user' => $user, 
                'access_token' => $accessToken,
                'message' => "Registration Successful"
            ],200);

        } catch (\Exception $e) {
            //throw $e;
            report($e);
            
            DB::rollBack();

            $response['success'] = false;
            $response['message'] = "Oops! Something went wrong, Try Again!";
    
            return response()->json($e, 422);
        }
        
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors(),
            ];
            return response()->json($response, 422); 
        }

        if (!auth()->attempt($data)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken], 200);

    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
