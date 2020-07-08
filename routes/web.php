<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('activitySelection', function () {
    return view('activity.modals.activitySelection');
});


Route::get('/', 'GeneralController@index')->name('home');

Auth::routes(['verify' => true]);
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');


Route::get('/check', 'UserController@userOnlineStatus');


Route::resource('/activity', 'ActivityController');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
