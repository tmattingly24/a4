<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreatePollController extends Controller
{

    /**
	* GET
    * /
	*/
    public function __invoke() {
        return view('create');
    }
}