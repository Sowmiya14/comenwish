<?php

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


Route::get('auth/google', 'Auth\SocialLoginController@redirectToGoogle');
Route::get('auth/google/callback','Auth\SocialLoginController@handleGoogleCallback');
Route::get('auth/facebook', 'Auth\SocialLoginController@redirectToFaceBook');
Route::get('auth/facebook/callback','Auth\SocialLoginController@handleFacebookCallback');
Route::post('account_kit', 'VendorMasterController@account_kit');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminAuth\LoginController@showLoginForm');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');


  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'vendor'], function () {
    Route::get('/', 'VendorAuth\LoginController@showLoginForm');
  Route::get('/login', 'VendorAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'VendorAuth\LoginController@login');
  Route::post('/logout', 'VendorAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'VendorAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'VendorAuth\RegisterController@register');

  Route::post('/password/email', 'VendorAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'VendorAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset/{token}', 'VendorAuth\ResetPasswordController@showResetForm');
});

// Auth::routes();
Route::get('/', 'ClientMasterController@index');
Route::get('/about', 'ClientMasterController@about');
Route::get('faq', 'ClientMasterController@faq');
Route::get('/contact', 'ClientMasterController@contact');
Route::get('/', 'ClientMasterController@index');
// Route::post('/listing','ClientMasterController@listing');
Route::post('/register','Auth\RegisterController@register');
Route::post('/login', 'Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
// Route::any('/search','SearchController@search');


Route::get('/listing/{service_name}/{location}','ClientMasterController@listing');

Route::get('/listing/products','ListingController@products');


