<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    /**
	* GET
    * /
	*/
    public function __invoke() {
		

       return view('registration');
    }
}