<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Activity;
use App\ActivityTags;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = DB::table("users")->count();

        $user = Auth::user();
        return view('homepage.index', compact('count'));
    }

    /**
     * Show the search page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search()
    {
        return view('search.index');
    }

    /**
     * Show the search page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        $count = DB::table("users")->count();
        return view('homepage.about', compact('count'));
    }

    /**
     * Show the search page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function privacy()
    {
        $count = DB::table("users")->count();
        return view('homepage.privacyPolicy', compact('count'));
    }

    /**
     * Show list of existing users search field.
     *
     * @return \Illuminate\Http\Response
     */
    public function userSearch(Request $request) 
    {
        if($request->ajax()) {
            $data = User::where('name', 'LIKE', $request->user.'%')
                        ->orWhere('username', 'LIKE', $request->user.'%')
                        ->get();
            $output = '';
            if (count($data)>0) {
                $output = '<div class="m-2">';
                foreach ($data as $user){
                    if($user->id != auth()->user()->id && $user->role != 'super admin'){
                        $output .= '<div class="d-flex mb-2 userInfo" data-id="'.$user->uuid.'">';
                        $output .= '<div>';
                        $output .= '<img src="'.$user->avatar.'" class="avatar avatar-xs alt=">';
                        $output .= '</div>';
                        $output .= '<div class="ml-2">';
                        $output .= '<h6 class="p-0 m-0 bold f-12">'.$user->name.'</h6>';
                        $output .= '<p class="p-0 m-0 regular f-12">'.$user->username.'</p>';
                        $output .= '</div>';
                        $output .= '</div>';
                   }
                }
                $output .= '</div>';
            }
            else {
                $output .= '<p class="p-0 m-0 bold f-10">'.'No Results'.'</p>';
            }
            return $output;
        }
    }

    /**
     * Show list of existing users in search field.
     *
     * @return \Illuminate\Http\Response
     */
    public function generalSearch(Request $request)
    {
        if($request->ajax()) {
            $data = User::where('id', '!=', 1)
                ->where('role', '!=', 'super admin')
                ->where('name', 'LIKE', $request->search.'%')
                ->orWhere('username', 'LIKE', $request->search.'%')
                ->get();
            $output = '';
            if (count($data)>0) {
                $output = '<div class="row" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $user){
                    $output .= '<div class="d-flex align-items-center">';
                    $output .= '<div class="avatar-icon">';
                    $output .= '<img src="'.$user->avatar.'" class="avatar avatar-md alt="'.$user->username.'">';
                    $output .= '</div>';
                    $output .= '<div class="ml-1 text-gray">';
                    $output .= '<a href="/dashboard/'.$user->uuid.'/show" class="text-uppercase "f-14 mb-0 bold ">'.$user->name.'</a>';
                    $output .= '<p class="">';
                    $output .= '<a href="/dashboard/'.$user->uuid.'/show" class="text-capitalize f-12 regular">'.$user->username.'</a>';
                    $output .= '</p>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
                $output .= '</div>';
            } else {
                $output .= '<p class="regular text-gray f-16">'.'User does not exist'.'</p>';
            }
            return $output;
        }
    }

    /**
     * General Map view using google map
     */
    public function mapView()
    {
        // $locations = UserLocations::where('home_address', '!=', null)->get();
        // dd($locations);
        $count = DB::table("users")->count();
        $user = Auth::user();
        return view('activity.partials.map', compact('count'));
    }
}
