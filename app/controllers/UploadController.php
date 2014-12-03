<?php

class UploadController extends BaseController
{


	/*  Creates a new race  */
	public function addRace()
		{
			$name = Input::get('name');
	        $packageID = Input::get('packageID');
	        $coverImage = Input::get('coverImage');
	        //$date = Input::get('date');
	        $location = Input::get('location');

	        $user = Race::create(array(
					'name' => $name,
					'packageID' => $packageID,
					//'date' => $date,
					'location' => $location
					
				));

	        File::makeDirectory('raceImages/' . $name);
	        
		Schema::create($name, function($table)
				{
				    $table->increments('id');
				    $table->string('url');
				    $table->string('bib1');
				    $table->string('bib2');
				    $table->string('bib3');
				    $table->string('bib4');
				    
				});  

		return View::make('profile.user')
						->with('user', $user);
	} 


	/*  Add photos to a race  */
	public function addPhotos()
	{ 
		$user = Auth::user();
		$race = Input::get('race');
		$files = Input::file('images');

		foreach($files as $file) {
		    $rules = array(
		       'file' => 'required|mimes:png,gif,jpeg,jpg,txt,pdf,doc,rtf|max:9999999999999999'
		    );
		    $validator = \Validator::make(array('file'=> $file), $rules);
		    if($validator->passes()){

		        $id = Str::random(14);
		        $id = "Hello";

		        $destinationPath = 'raceImages/' . $race . "/" . $id;
		        $filename = $id;
		        $mime_type = $file->getMimeType();
		        $extension = $file->getClientOriginalExtension();
		        $upload_success = $file->move($destinationPath, $filename);
		     
		        DB::table($race)->insert(
				    array('url' => $filename)
				);

		    } else {
		        return Redirect::back()->with('error', 'I only accept images.');
		    }
		    





		    return View::make('profile.user')
					->with('user', $user);
					
		}

	}

	 
	/*  Load the photos of a race with info and bib number inputs */
	public function loadPhotos()
	{


		$user = Auth::user();

		$race = Input::get('race');

		

		//$urls = DB::table($race)->lists('url');
		$urls = DB::table($race)->get();


		return View::make('profile.user')
					->with('user', $user)
					->with('url', $urls)
					->with('race', $race);
					



	}

	/*  Add bib numbers to database  */
	public function editPhotos()
	{	
		$user = Auth::user();
		$delete = Input::get('delete');
		$cover = Input::get('cover');
		$race = Input::get('race');

		if(isset($delete))
		foreach($delete as $delete)
		{
			DB::table($race)->where('url', '=', $delete)->delete();
		}
		if(isset($cover))
		{
			DB::table('tblRace')
	            ->where('name', $race)
	            ->update(array('coverImage' => $cover));
	    }

		return View::make('profile.user')
					->with('user', $user);
					
		
		
	}


}


