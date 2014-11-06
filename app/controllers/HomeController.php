<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/* Home Page */
	public function home()
	{
		if(Auth::check())
		{
			$user = Auth::user();
			return View::make('home')
				->with('user', $user);
		}

		return View::make('home');

	}
	/* Browse Races Page */
	public function browseRaces()
	{


		$races = DB::table('tblRace')->get();
		

		return View::make('browseRaces')
				->with('races', $races);

	}
	/*  View Specific Race via 'race.blade.php' page */
	public function raceView($raceName)
	{	

		$name = $raceName;
		$race = DB::table($raceName)->get();
		
		//return $race->id;
		return View::make('race')
				->with('race', $race)
				->with('name', $name);
	}

}
