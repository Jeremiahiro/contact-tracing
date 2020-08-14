<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use Carbon\Carbon;
use App\UserLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Redirect the user to the social authentication page.
     * this include GitHub, Twitter, Facebook and Google
     *
     * @return Response
    */
    public function redirectToProvider($provider)
    {
         return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Social Account.
     *
     * @return Response
    */
    public function handleProviderCallback($provider)
    {
        try {
            $userSocial = Socialite::driver($provider)->user();
            // $userSocial = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        if ($userSocial->email != null) {
            $authUser = $this->findOrCreateUser($userSocial, $provider);
            Auth::login($authUser, true);
            return redirect()->intended('/');
        }

        return redirect('/login')->with('error', 'Unable to Login, try another login option!');
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($userSocial, $provider)
    {
        $authUser = User::where('email', $userSocial->email)->first();
        if ($authUser) {
            $authUser->update([
                'provider'          => $provider,
                'provider_id'       => $userSocial->id,
                'access_token'      => $userSocial->token,
                'avatar'            => $userSocial->avatar,
            ]);
            return $authUser;
        }

        $name = $userSocial->name;
        $string = substr($name, 0 , 5);
        $randomDigit = rand(100,999);

        $username = '@'.$string.$randomDigit;

        $uuid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0);

        $user = new User();
        $user->uuid = $uuid;
        $user->name = $userSocial->name;
        $user->username = $username;
        $user->email = $userSocial->email;
        $user->provider = $provider;
        $user->provider_id = $userSocial->id;
        $user->access_token = $userSocial->token;
        $user->avatar = $userSocial->avatar;
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();

        $location = new UserLocation();
        $location->user_id = $user->id;
        $location->save();

        return $user;
    }

    /**
      * Send a failed response with a msg
      *
      * @param null $msg
      * @return \Illuminate\Http\RedirectResponse
    */
    protected function sendFailedResponse($message = null)
    {
         return redirect()->route('login')
             ->withError(['message' => $message ?: 'Unable to login, try with another provider to login.']);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, User $user) 
    {
        $user->status = 1; 
        $user->save();

        return redirect()->intended($this->redirectPath());
     }
}
