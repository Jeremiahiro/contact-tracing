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



Route::get('index', function () {
    return view('activity.index');
});

Route::get('create', function () {
    return view('activity.create');
});

Route::get('proximity', function () {
    return view('activity.modals.proximity');
});

Route::get('profile', function () {
    return view('profile.index');
})->name('profile.index');

Route::get('alert', function () {
    return view('alert.index');
});


Auth::routes(['verify' => true]);


Auth::routes(['verify' => true]);
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('/', 'GeneralController@index')->name('home');
Route::resource('/activity', 'ActivityController');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Route::get('/dashboard/settings/{$user_id}', 'DashboardController@show')->name('dashboard.settings');
