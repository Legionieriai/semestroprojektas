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
    return view('main');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/register', function () {
    return view('register');
});



Route::get('/test',function(){
    return view('test');
});

Route::get('/test2',function(){
    return view('test2');
});

Route::get('loginn', 'Controller@showloginn');



Route::get('login', 'Controller@login');

Route::get('addUrl', 'Controller@insertData');

Route::get('getUrl', 'Controller@getData');

Route::get('checkname', 'Controller@getName');



