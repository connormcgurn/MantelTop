<?php
class SessionsController extends BaseController {



	public function create()
		{
			if (Auth::check()) return Redirect::to('/admin');
			return  View::make('sessions.create');

		}
	public function store()
		{
			if (Auth::attempt(Input::only('username', 'password')))
			{
				return "Welcome " . Auth::user()->username;
			}
			return Redirect::back()->withInput()->withErrors(User::$errors);

		}
	Public function destroy()
	{
		Auth::logout();
		return Redirect::route('sessions.create');
	}





}