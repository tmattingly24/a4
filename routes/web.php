<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//Route::get('/register', 'RegistrationController');

//Routes that require authorization

Route::group(['middleware' => 'auth'], function () {
	
	
Route::get('/create', 'PollController');

Route::get('/manage', 'PollController@managePolls');

Route::post('/pollcreated', 'PollController@saveNewPoll');

});

Route::get('/polls/{id}', 'PollController@view');

Route::get('/', 'DefaultController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
