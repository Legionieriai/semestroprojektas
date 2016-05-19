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

Route::get('/oldversion', function () {
    return view('oldversion');
});

Route::get('/signin', function () {
    return view('loginwindow');
});

Route::get('/', function () {
    return view('index');
});



Route::get('/test',function(){
    return view('test');
});

Route::get('loginn', 'Controller@showloginn');



Route::get('login', 'Controller@login');

Route::get('addUrl', 'Controller@insertData');

Route::get('getUrl', 'Controller@getData');



