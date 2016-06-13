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
    return view('index');
});

Route::any('/spider/', function() {
    return view('spider');
});

Route::get('/tests/', 'TestController@test');

Route::get('/query/{model}',['uses' =>  'QueryController@guide']);

Route::get('/delete/{model}',['uses' =>  'DeleteController@guide']);

Route::any('/upload/{fun}', ['uses' => 'UploadController@guide']);
