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

Route::get('/', function () {
    return view('homepage.index');
});

Route::get('data_input', function () {
    return view('homepage.data_input');
});

Route::get('fulfilled', function () {
    return view('homepage.fulfilled');
});


Auth::routes(['verify' => true]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');
