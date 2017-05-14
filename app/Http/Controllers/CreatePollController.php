<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CreatePollController extends Controller
{

    /**
	* GET
    * /
	*/
    public function __invoke(Request $request) {
		
	//Redirect user to login page if trying to create new poll and not logged in
		
		$user = $request->user();
		
		if(!$user) {
			
		  Session::flash('message','You have to be logged in to create a new poll');
		  return redirect('/login');
    	}
		
  		return view('create');
    }
}