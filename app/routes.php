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

/*  Home page   */
Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@home'
    ));

/*  View races   */
Route::get('browseRacesCont', array(
        'as' => 'browseRacesCont',
        'uses' => 'HomeController@browseRaces'
        ));
Route::get('browseRaces', function()
{
    return View::make('browseRaces');
});
Route::get('postRaceView', array(
        'as' => 'postRaceView',
        'uses' => 'HomeController@postRaceView'
        ));
Route::get('{raceName}', array(
        'as' => 'raceName',
        'uses' => 'HomeController@raceView'
        ));



/*  Admin Page Routes - Race Management  */
Route::post('imageUpload', 'UploadController@addPhotos');
Route::post('addRace', 'UploadController@addRace');
Route::post('loadPhotos', 'UploadController@loadPhotos');
Route::post('saveBibNumber', 'UploadController@saveBibNumber');

Route::get('admin', function()
{
	return 'Admin Page';
})->before('auth');


/*  User Management Routes  */
Route::resource('users', 'UserController');
Route::resource('sessions', 'SessionsController');
// 
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::get('users/create', 'userController@create');
Route::get('users', 'userController@index');

/*  Admin Page - Profile Page  */
Route::get('/profile/{username}', array(
        'as' => 'profile-user',
        'uses' => 'ProfileController@user'
        ));

/* Authenticated group  ---  Only allows access if the user is logged in -- 
      --  will redirect to login page if not logged in */
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
    Route::get('/profile/{username}', array(
        'as' => 'profile-user',
        'uses' => 'ProfileController@user'
        ));
    Route::get('/build/{username}', array(
        'as' => 'build',
        'uses' => 'buildController@build'
        ));
});

/* Unauthenticated group  ---  Routes prior to login */
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
    /* SignIn (POST) */
    Route::post('/account/sign-in', array(
        'as' => 'account-sign-in-post',
        'uses' => 'AccountController@postSignIn'

        ));
    Route::get('/check', array(
        'as' => 'check',
        'uses' => 'AccountController@check'

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


}); // End of Unauthenticated group