<?php
use Cartalyst\Sentry\Facades\Laravel\Sentry;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
 |--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------

*/
Route::any('/', array('as' => 'home', 'uses' => 'Monujo\Controller\HomeController@getHome'));

Route::get('login', array('as' => 'login.get', 'uses' => 'Monujo\Controller\UserController@getLogin'));
Route::post('login', array('as' => 'login.post', 'uses' => 'Monujo\Controller\UserController@postLogin'));

Route::get('signup', array('as' => 'signup.get', 'uses' => 'Monujo\Controller\UserController@getSignup'));
Route::post('signup', array('as' => 'signup.post', 'uses' => 'Monujo\Controller\UserController@postSignup'));

Route::get('logout', array('as' => 'logout.get', 'uses' => 'Monujo\Controller\UserController@getLogout'));

Route::get('user/activate/{id}/{token}', array('as' => 'activate.get', 'uses' => 'Monujo\Controller\UserController@getActivate'));

Route::get('user/forgot_password', array('as' => 'forgot.get', 'uses' => 'Monujo\Controller\UserController@getPasswordForgot'));
Route::post('user/forgot_password', array('as' => 'forgot.post', 'uses' => 'Monujo\Controller\UserController@postPasswordForgot'));

Route::get('user/password_reset/{id}/{token}', array('as' => 'reset.get', 'uses' => 'Monujo\Controller\UserController@getPasswordReset'));
Route::post('user/password_reset', array('as' => 'reset.post', 'uses' => 'Monujo\Controller\UserController@postPasswordReset'));


Route::group(array('prefix' => 'api', 'before' => 'logged'), function () {
    Route::get('account', array('as' => 'profile.get', 'uses' => 'Monujo\Controller\Api\AccountController@getAccount'));
    Route::post('account', array('as' => 'profile.post', 'uses' => 'Monujo\Controller\Api\AccountController@postAccount'));
});