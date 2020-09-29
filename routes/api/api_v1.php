<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'API\V1'], function () {
    // Route::group(['namespace' => 'API\V1','middleware' => ['verifyAPIKey']], function () {

    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    
    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('user', 'AuthController@user');
        Route::group(['middleware' => ['super_admin']], function () {
            Route::apiResource('/splash', 'SplashController');
        
        });
    });

});

// Route::middleware('auth:api')->get('/user', function(Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
