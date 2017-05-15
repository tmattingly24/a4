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




//Authorization is handled within the controller


Route::get('/create', 'PollController');

Route::get('/manage', 'PollController@managePolls');

Route::post('/pollcreated', 'PollController@saveNewPoll');

Route::get('/polls/{id}', 'PollController@view');

Route::get('/editpoll/{id}', 'PollController@editPoll');

Route::post('/savechanges', 'PollController@saveChanges');

Route::get('/deletepoll/{id}', 'PollController@deletePoll');

Route::get('/confirmdelete/{id}', 'PollController@confirmDelete');

Route::get('/vote', 'PollController@vote');

Route::get('/comment', 'PollController@saveComment');

Route::get('/browse', 'PollController@showRandom');

Route::get('/', 'PollController@showRandom');

Auth::routes();

Route::get('/home', 'PollController@showRandom');


/**
* Log viewer
* (only accessible locally)
*/

if(config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}
