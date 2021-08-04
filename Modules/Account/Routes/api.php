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

//Route::middleware('auth:api')->get('/account', function (Request $request) {
//    return $request->user();
//});
//Route::group([
//    'middleware' => 'api',
//    'prefix' => 'auth'
//], function () {
//    Route::post('/login', 'AccountController@login');
//    Route::post('/register', 'AccountController@register');
//    Route::post('/logout', 'AccountController@logout');
////    Route::post('/refresh', [AuthController::class, 'refresh']);
////    Route::get('/user-profile', [AuthController::class, 'userProfile']);
//});
Route::group(['prefix' => 'v1'], function () {
    Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
        Route::post('/login', 'AccountController@login');
        Route::post('/register', 'AccountController@register');
        Route::group(['middleware' => 'jwt.auth'], function () {
            Route::post('/logout', 'AccountController@logout');
            Route::get('/user-profile', 'AccountController@userProfile');
        });
    });
});
