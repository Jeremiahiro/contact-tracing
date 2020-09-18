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

Auth::routes(['verify' => true]);

// unauthenticate routes
Route::get('/activity/map-view', 'GeneralController@mapView')->name('map.view');
Route::get('/about-us', 'GeneralController@about')->name('about');
Route::get('/privacy-policy', 'GeneralController@privacy')->name('privacy');
Route::get('/terms-of-use', 'GeneralController@terms')->name('tos');
Route::get('/gdpr/dpa', 'GeneralController@gdprDPA')->name('gdpr.dpa');

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');
Route::get('/', 'GeneralController@index')->name('home');

// authenticated routes
Route::group(['middleware' => ['auth', 'verified', 'gdpr.terms']], function () {
    Route::get('/search', 'GeneralController@search')->name('search');
    Route::get('/search/result', 'GeneralController@generalSearch')->name('search.query');
    Route::get('/users/search', 'GeneralController@userSearch')->name('search.user');

    Route::resource('/activity', 'ActivityController');
    Route::delete('/archive/activity/{id}', 'ActivityController@archive')->name('archive.activity');
    Route::get('/archive/activity/{id}', 'ActivityController@unarchive')->name('unarchive.activity');
    Route::get('/calendar', 'ActivityController@calendar')->name('calendar');
    Route::get('/sort', 'ActivityController@calendarActivity')->name('date_sort');
    
    Route::get('/dashboard', 'UserController@index')->name('dashboard.index');
    Route::get('/dashboard/{id}/show', 'UserController@show')->name('dashboard.show');
    Route::get('/dashboard/{id}/edit', 'UserController@edit')->name('dashboard.edit');
    Route::post('/dashboard/update', 'UserController@update')->name('dashboard.update');

    Route::post('/follow', 'UserController@follow')->name('follow');
    Route::get('/{username}/followers', 'UserController@followers')->name('followers');
    Route::get('/{username}/followings', 'UserController@followings')->name('followings');
    Route::get('/{username}/locations', 'LocationController@index')->name('locations');

    Route::get('/favorite/{location}', 'LocationController@toggleFavourite');
    Route::get('/locations', 'LocationController@index')->name('locations');
    Route::post('/dashboard/location/update', 'LocationController@update')->name('location.update');
    Route::get('/location/visibility', 'LocationController@locationVisibility')->name('changeStatus');

    Route::get('/dashboard/{id}/setting', 'SettingController@setting')->name('dashboard.setting');
    Route::post('/dashboard/password', 'SettingController@updatePassword')->name('dashboard.password');
    Route::get('/deactivate/account', 'SettingController@deactivate')->name('deactivateAccount');
    Route::post('/image-upload', 'SettingController@uploadImage')->name('upload.image');
    Route::post('/image-delete', 'SettingController@destroyImage')->name('delete.image');
    Route::get('/walkthrough/complete', 'SettingController@skipWalkthrough')->name('tour.finish');

    Route::get('/notification', 'NotificationsController@show')->name('notification');
    Route::get('/get_data', 'GeneralController@fetchData');

});

Route::get('/offline', function () {    
    return view('vendor/laravelpwa/offline');
});


// Route::get('/admin/login', 'AdminController@gdprDPA')->name('gdpr.dpa');
