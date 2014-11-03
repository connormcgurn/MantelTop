<?php

class ProfileController extends BaseController {




	public function user($username)
	{
		if(Auth::check())
		{
			$user = User::where('username', '=', $username);
			
			//$companyName = DB::select("select name FROM company WHERE adminId = '$userId'");
			
			
			

			if($user->count())
			{
				$user = $user->first();
				
				return View::make('profile.user')
					->with('user', $user);
					
			}
			return App::abort(404);
		}
		else
		{
			return Redirect::route('account-sign-in');
		}

	}		



}