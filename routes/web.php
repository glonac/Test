<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');
Route::get('/test', function () {
    return view('frontend.test');
});
Route::get('/log', 'UserController@show')->name('userinfo')->middleware('checksession');
Route::get('/exit', 'UserController@exit')->name('exit');
Route::get('/auto', function () {
    return view('frontend.Auto');
});
Route::post('/updateimg', 'UserController@updateimg')->name('update-image');
Route::get('/register', function () {
    return view('frontend.register');
});
Route::post('/register', 'UserController@register');
Route::post('/logging', 'UserController@logging')->middleware('throttle:30');

Route::get('/check', 'TestController@index');
Route::post('/posts', 'TestController@insert');
Route::post('/products/update/{id}', 'TestController@update');

Route::get('/delete/{id}', 'TestController@delete');
Route::get('/trening', function () {
    return view('frontend.trening');
});
Route::post('/search', 'TestController@search');
Route::post('/changePass', 'UserController@changePass');
Route::post('/changelog', 'UserController@changelog');
Route::get('/header', 'NavbarController@navbar')->name('navbar');


