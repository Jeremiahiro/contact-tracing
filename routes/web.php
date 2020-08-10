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
})->name('activity.create');

Route::get('proximity', function () {
    return view('activity.modals.proximity');
});

Route::get('profile', function () {
    return view('profile.index');
})->name('profile.index');

Route::get('alert', function () {
    return view('alert.index');
});

Route::get('activityConnection', function () {
    return view('partials.modals.activityConnection');
});

// Route::get('settings', function () {
//     return view('profile.settings');
// });


Auth::routes(['verify' => true]);


Auth::routes(['verify' => true]);
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'GeneralController@index')->name('home');
    Route::resource('/activity', 'ActivityController');
    Route::get('/dashboard', 'UserController@index')->name('dashboard.index');
    Route::get('/dashboard/{id}/show', 'UserController@show')->name('dashboard.show');
    Route::get('/dashboard/{id}/edit', 'UserController@edit')->name('dashboard.edit');
    Route::post('/dashboard/update', 'UserController@update')->name('dashboard.update');
    Route::post('/follow', 'UserController@follow')->name('follow');
    Route::post('/dashboard/location/update', 'UserLocationController@update')->name('location.update');
    Route::get('/search', 'GeneralController@search')->name('search');
    Route::get('/search/result', 'GeneralController@searchResult')->name('search.query');
    Route::get('/users/search', 'GeneralController@searchUser')->name('users.search');
    Route::get('/dashboard/{id}/setting', 'SettingController@setting')->name('dashboard.setting');
    Route::post('/dashboard/password', 'SettingController@updatePassword')->name('dashboard.password');
    Route::get('/location/visibility', 'SettingController@location')->name('changeStatus');
    Route::get('/deactivate/account', 'SettingController@deactivate')->name('deactivateAccount');

});

// Route::get('/dashboard/settings/{$user_id}', 'DashboardController@show')->name('dashboard.settings');
