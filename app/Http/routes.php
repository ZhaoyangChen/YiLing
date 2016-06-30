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


Route::get('/', [
    'middleware' => 'auth',
    function () {
    return view('index');
    }
]
);

Route::any('/spider/',
    [
        'middleware' => 'auth',
        function () {
            return view('spider');
        }
]
);

Route::any('/question/',
    [
        'middleware' => 'auth',
        function () {
            return view('question');
        }
    ]
);

Route::get('/tests/', ['middleware' => 'auth','uses' =>  'TestController@test']);

Route::get('/query/{model}',['middleware' => 'auth','uses' =>  'QueryController@guide']);

Route::get('/download/',['middleware' => 'auth','uses' =>  'DownloadController@download']);

Route::get('/delete/{model}',['middleware' => 'auth','uses' =>  'DeleteController@guide']);

Route::any('/upload/{fun}', ['middleware' => 'auth','uses' => 'UploadController@guide']);

Route::any('/spider/{fun}', ['middleware' => 'auth','uses' => 'SpiderController@guide']);

Route::auth();