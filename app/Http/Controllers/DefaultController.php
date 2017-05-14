<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{

    /**
	* GET
    * /
	*/
    public function __invoke() {
        return view('welcome');
    }
}