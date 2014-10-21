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




Route::group(array('before' => 'auth'), function() {

    Route::group(array('before' => 'csrf'), function(){

        Route::post('/account/change-password', array(
            'as' => 'account-change-password',
            'uses' => 'AccountController@postChangePassword'
        ));

    });

    Route::get('/account/change-password', array(
            'as' => 'account-change-password',
            'uses' => 'AccountController@getChangePassword'
        ));

    Route::get('/account/sign-out', array(
            'as' => 'account-sign-out',
            'uses' => 'AccountController@getSignOut'

        ));


});
Route::get('/profile/{username}', array(
        'as' => 'profile-user',
        'uses' => 'ProfileController@user'
        ));

/* Unauthenticated group */
Route::group(array('before' => 'guest'), function()
{
    /* CSRF Protection */
    Route::group(array('before' => 'csrf'), function(){
        /* Create accour (POST) */
        Route::post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'AccountController@postCreate'
        ));
        /* SignInn (POST) */
        Route::post('/account/sign-in', array(
            'as' => 'account-sign-in-post',
            'uses' => 'AccountController@postSignIn'

        ));
        
    });
    /* Sign In (GET) */
    Route::get('/account/sign-in', array(
        'as' => 'account-sign-in',
        'uses' => 'AccountController@getSignIn'

        ));
    /* SignInn (POST) */
    Route::post('/account/sign-in', array(
        'as' => 'account-sign-in-post',
        'uses' => 'AccountController@postSignIn'

        ));
    Route::get('/check', array(
        'as' => 'check',
        'uses' => 'AccountController@check'

        ));
    Route::get('/profile/{username}', array(
        'as' => 'profile-user',
        'uses' => 'ProfileController@user'
        ));




    /* Create accour (GET) */
    Route::get('/account/create', array(
        'as' => 'account-create',
        'uses' => 'AccountController@getCreate'
    ));
    Route::get('/account/activate/{code}', array(
            'as' => 'account-activate',
            'uses' => 'AccountController@getActivate'
        ));
});