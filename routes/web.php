<?php
//Route::get('/', function () {
//    return 'Hello Worl';
//});
Route::get('/','IndexController@index');
Route::get('welcome', function(){
    return view ('welcome');
});
Route::get('/news','NewsController@index');
Route::get('/news/{id}','NewsController@show')->name('news_show');
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

