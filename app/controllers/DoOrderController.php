<?php

class DoOrderController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter(function()
        {
            //
            if (Auth::guest()) return Redirect::to('user/login');
        });
    }

	//public function getAdminProfile() {}


	public function getUserAddress() {

		$address = Auth::user()->address;
		return View::make('try.confirmAd')->with('address',$address);
	}

	public function postUserAddress() {

		//$address = Auth::user()->address;
		//return View::make('try.confirmAd')->with('address',$address);

		return 'next step:';

	}

	public function getEditUserAddress() {

		$address = Auth::user()->address;
		//return View::make('try.confirmAd')->with('address',$address);
		return View::make('try.editAd')->with('address',$address);
	}
	public function postEditUserAddress() {

		//$address = Auth::user()->address;
		//return View::make('try.confirmAd')->with('address',$address);
		
		$validator = Validator::make(
		    array('address' => Input::get('address')),
		    array('address' => 'required')
		);

		if ($validator->fails())
		{
		    // The given data did not pass validation
			Redirect::to('doorder/edit-user-address')
			->withErrors($validator)
            ->withInput();
		}else{
			//store
			$user = Auth::user();
			$user->address = Input::get('address');
			$user->updateUniques();

		}

		// redirect
        Session::flash('message', 'Successfully update address!');
        return Redirect::to('doorder/user-address');
	}
}