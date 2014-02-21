<?php

class ImageController extends \BaseController {

	public function upload(){

		$file = Input::file('image');
		$destinationPath = 'upload/';
		$filename = $file->getClientOriginalName();
		Input::file('image')->move($destinationPath, $filename);

	}


}