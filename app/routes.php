<?php

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
Route::any('/', array('as' => 'home' , function(){
    return View::make('pages.home');
}));

Route::get('login', array('as' => 'login.get', 'uses' => 'Monujo\Controller\UserController@getLogin'));
Route::post('login', array('as' => 'login.post', 'uses' => 'Monujo\Controller\UserController@postLogin'));

Route::get('logout', array('as' => 'logout.get', 'uses' => 'Monujo\Controller\UserController@getLogout'));


Route::group(array('before' => 'logged'), function () {
    Route::get('profile', array('as' => 'profile.get', 'uses' => 'Monujo\Controller\UserController@getProfile'));
    Route::post('profile', array('as' => 'profile.post', 'uses' => 'Monujo\Controller\UserController@postProfile'));
});