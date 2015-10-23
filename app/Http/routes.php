<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/lorem-ipsum', 'LoremController@getLorem');
Route::post('/lorem-ipsum', 'LoremController@postLorem');

Route::get('/usergenerator', 'UserGenController@getUserGen');
Route::post('/usergenerator', 'UserGenController@postUserGen');
