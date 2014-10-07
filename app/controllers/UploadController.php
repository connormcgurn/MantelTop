<?php

class UploadController extends BaseController {

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

	public function addRace()
	{

	$files = Input::file('images');

foreach($files as $file) {
    $rules = array(
       'file' => 'required|mimes:png,gif,jpeg,txt,pdf,doc,rtf|max:2000000000000000'
    );
    $validator = \Validator::make(array('file'=> $file), $rules);
    if($validator->passes()){

        $id = Str::random(14);

        $destinationPath = 'uploads/' . $id;
        $filename = $file->getClientOriginalName();
        $mime_type = $file->getMimeType();
        $extension = $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $id);
    } else {
        return Redirect::back()->with('error', 'I only accept images.');
    }
}
	return View::make('');

	}
}