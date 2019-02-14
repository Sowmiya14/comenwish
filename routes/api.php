<?php

use Illuminate\Http\Request;

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
Route::post('/signup' , 'UserApiController@signup');
Route::post('/login', 'UserApiController@login');
Route::post('/categories','UserApiController@categories');
Route::post('/auth/facebook','Auth\SocialLoginController@facebookViaAPI');
Route::post('/auth/google','Auth\SocialLoginController@googleViaAPI');


Route::post('/event', 'UserApiController@event');

Route::group(['middleware' => ['auth:api']], function () {
	Route::post('/update_profile','UserApiController@update_profile');
	Route::post('change_password', 'UserApiController@change_password');
	Route::post('/logout', 'UserApiController@logout');
});
