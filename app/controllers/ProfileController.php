<?php

class ProfileController extends BaseController {

	public function user($username)
	{
		$user = User::where('username', '=', $username);



		if($user->count())
		{
			$user = $user->first();
			return View::make('profile.user')
				->with('user', $user);
		}
		return App::abort(404);

	}
	/*public function postSetCompany($username)
	{
		
		if(Auth::check())
		{
			$user = User::where('username', '=', $username);
		}
		
		//DB::update('update users set votes = 100 where name = ?', array('John'));
		//User::update('company_active', '=', 5);
		//$user->company_active = 5;

	}*/



}