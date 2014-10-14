<?php
class UserController extends BaseController {



	public function index()
	{
		 //Select * from users
		//'	  ' = User::find(1); <= finds user with ID of 1
	//$users = DB::table('users')->get();
	//$users = DB::select('select * FROM users'); //<= Traditional queries
		$users = User::all();
		return $users;
	}

	public function show($username)
	{
		$user = User::whereUsername($username)->first();
		return View::make('users.show', ['user' => $user]);

	}
	public function create()
	{
		return View::make('users.create');

	}
	public function store()
	{
		if ( ! User::isValid(Input::all()))
		{
			return Redirect::back()->withInput()->withErrors(User::$errors);
		}

		$user = new User;
		$user->username = Input::get('username');
		$user->firstName = Input::get('FirstName');
		$user->lastName = Input::get('LastName');
		$user->email = Input::get('Email');
		$user->password = Hash::make(Input::get('Password'));
		$user->save();
		return Redirect::route('users.index'); 
		

	}







}