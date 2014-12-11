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
Route::get('browseRaces', array(
        'as' => 'browseRaces',
        'uses' => 'HomeController@browseRaces'
        ));
Route::get('postRaceView', array(
        'as' => 'postRaceView',
        'uses' => 'HomeController@postRaceView'
        ));
Route::get('browseRaces/{raceName}', array(
        'as' => 'raceName',
        'uses' => 'HomeController@raceView'
        ));

/* Modeling and Portrain Page */
Route::get('PortraitsandModeling', array(
        'as' => 'PortraitsandModeling',
        'uses' => 'HomeController@PortraitsandModeling'
        ));


/*  Cart and purchasing routes */
Route::post('addToCart', 'CartController@addToCart');
Route::post('editCart', 'CartController@editCart');
Route::get('checkout', 'CartController@checkout');
Route::post('cartData', 'CartController@cartData');
Route::get('Cart', array(
        'as' => 'Cart',
        'uses' => 'CartController@getCart'
        ));



/*  Admin Page Routes - Race Management  */
Route::post('imageUpload', 'UploadController@addPhotos');
Route::post('addRace', 'UploadController@addRace');
Route::post('loadPhotos', 'UploadController@loadPhotos');
Route::post('editPhotos', 'UploadController@editPhotos');

Route::post('addPortfolioPhotos', 'UploadController@addPortfolioPhotos');


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


//Brandon Routes

Route::get('racesandsports', function()
{
    return View::make('racesandsports');
}); 
Route::get('portfolio', function()
{
    return View::make('portfolio');
}); 

