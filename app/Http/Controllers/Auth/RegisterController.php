<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserLocation;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller   
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' =>  ['required', 'string', 'max:255'],
            'email'     =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  =>  ['required', 'string', 'min:8', 'confirmed', 'regex:/(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
            'username'  =>  ['string'],
            'phone'     =>  ['phone:AUTO,NG'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $name = $data['name'];
        $string = substr($name, 0, 5);
        $randomDigit = rand(10,99);

        $username = '@'.$string.$randomDigit;

        $uuid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = Hash::make($data['password']);
        $user->username = $username;
        $user->uuid = $uuid;
        $user->avatar =  'https://res.cloudinary.com/iro/image/upload/v1581499532/Profile_Pictures/wzoe4az0cg6lm7idfocb.png';

        $user->save();

        $location = new UserLocation();
        $location->user_id = $user->id;
        $location->save();

        return $user;

        // return User::create([
        //     'name'      => $data['name'],
        //     'email'     => $data['email'],
        //     'phone'     => $data['phone'],
        //     'password'  => Hash::make($data['password']),
        //     'username'  => $username,
        //     'uuid'      => $uuid,
        //     'avatar'    =>  'https://res.cloudinary.com/iro/image/upload/v1581499532/Profile_Pictures/wzoe4az0cg6lm7idfocb.png',
        // ]);
    }
}
