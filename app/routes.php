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

Route::get('/', function()
{
	return View::make('home');
});

Route::get('browseRaces', function()
{
    // Return about us page
    return View::make('browseRaces');
});
Route::get('addRace', function()
{
    // Return about us page
    return View::make('addRace');
});

Route::post('imageUpload', 'UploadController@addRace');


Route::get('admin', function()
{
	return 'Admin Page';
})->before('auth');

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('users', 'UserController');
Route::resource('sessions', 'SessionsController');



Route::get('users', 'userController@index');
Route::get('users/{username}', 'userController@show');

Route::get('users/create', 'userController@create');