<?php

class AccountController extends BaseController {




	public function getSignIn()
	{
		return View::make('account.signin');

	}
	public function postSignIn()
	{
		// Validate email and password inputs
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email',
				'password' => 'required'
			)
		);
		if($validator->fails())
		{
			//Redirect to the sign in page
			return Redirect::route('account-sign-in')
					->withErrors($validator)
					->withInput();
		}
		else
		{ 

			$remember = (Input::has('remember')) ? true : false;
			
			$email = Input::get('email');
			$password = Input::get('password');

			$credentials = array(
            	'username' => Input::get('email'),
            	'password' => Input::get('password')
        	);
			
			/*Auth::attempt(array(
					'username' => Input::get('username'),
					'password' => Input::get('password')
				), $remember);*/
			Auth::loginUsingId(1);
			//if($auth)
			
			//Auth::attempt($credentials, true);
			if(Auth::check())
			{
				$user = Auth::user();
				//return Redirect::intended('/');
				//return Redirect::route('profile-user');
				return View::make('home')
				->with('user', $user);
			}

			else
			{
				return Redirect::route('account-sign-in')->with('global', 'There was a problem');
				//return 'failed';
			}

		} 
		return Redirect::route('account-sign-in')->with('global', 'There was a problem, activated?');

	}
	public function getSignOut()
	{
		Auth::logout();
		return Redirect::route('home');

	}
	public function getChangePassword()
	{
		return View::make('account.password');
	}
	public function postChangePassword()
	{
		$validator = Validator::make(Input::all(),
			array(
				'old_password' => 'required',
				'password' => 'required|min:6',
				'password_again' => 'required|same:password'
			)
		);
		if($validator->fails())
		{
			return Redirect::route('account-change-password')
				->withErrors($validator);
		}
		else
		{
			//change password
			$user = User::find(Auth::user()->id);
			$old_password = Input::get('old_password');
			$password = Input::get('password');

			if(Hash::check($old_password, $user->getAuthPassword())) 
			{
				$user->password = Hash::make($password);

				if($user->save())
				{
					return Redirect::route('profile.user')
						->with('global', 'Your password has been changed');
				}

			}
		}
		return Redirect::route('account-change-password')
			->with('global', 'Your password could not be changed');
	}
	public function check()
	{
		if(Auth::check())
		{
		return 'logged in';
		}
		else
		{
			return 'failed';
		}	
	}



	public function getCreate()
	{
		return View::make('account.create');

	}
	public function postCreate()
	{
		$validator = Validator::make(Input::all(),
			array(
				'Email' 			=> 'required|max:200|email|unique:users',
				'username' 			=> 'required|max:50|min:3|unique:users',
				'FirstName' 		=> 'required',
				'LastName' 			=> 'required',
				'Password' 			=> 'required|min:6',
				'ConfirmPassword' 	=> 'required|same:Password',

			)
		);
		if($validator->fails())
		{
			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();
		}
		else
		{
			$email = Input::get('Email');
			$username = Input::get('username');
			$FirstName = Input::get('FirstName');
			$LastName = Input::get('LastName');
			$Password = Input::get('password');

			//Activation Code
			$code = str_random(60);

			$user = User::create(array(
				'email' => $email,
				'username' => $username,
				'firstName' => $FirstName,
				'lastName' => $LastName,
				'password' => Hash::make($Password),
				
			));


		}

	}

	public function confirmation()
	{

		return View::make('account/confirmation');
	}

	public function getActivate($code)
	{
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if($user->count())
		{
			$user = $user->first();
			//Update user to active state
			$user->active = 1;
			$user->code = '';

			if($user->save())
			{
				return Redirect::route('home')
						->with('global', 'Activated! You can now sign in!');
			}
			return Redirect::route('home')
						->with('global', 'Activated! You can now sign in!');

		}

		
	}






}