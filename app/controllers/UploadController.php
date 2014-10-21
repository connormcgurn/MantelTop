<?php

class UploadController extends BaseController {


	public function addRace()
	{



		$file = Input::file('file');
$destinationPath = 'uploads';
// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
$filename = str_random(12);
//$filename = $file->getClientOriginalName();
//$extension =$file->getClientOriginalExtension(); 
$upload_success = Input::file('file')->move($destinationPath, $filename);

if( $upload_success ) {
   return Response::json('success', 200);
} else {
   return Response::json('error', 400);
}









		
		/* $files = Input::file('images');

		foreach($files as $file) {
		    $rules = array(
		       'file' => 'required|mimes:png,gif,jpeg,jpg,txt,pdf|max:9999999999999999999999'
		    );
		    $validator = \Validator::make(array('file'=> $file), $rules);
		    if($validator->passes()){

		        $id = Str::random(8);

		        $destinationPath = 'uploads/' . $id;
		        $filename = $file->getClientOriginalName();
		        $mime_type = $file->getMimeType();
		        $extension = $file->getClientOriginalExtension();
		        $upload_success = $file->move($destinationPath, $filename);
		    } else {
		        return Redirect::back()->with('error', 'I only accept images.');
		    }
	}   
*/
	

}}



