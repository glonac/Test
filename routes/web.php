<?php
use Illuminate\Support\Facades\Route;
//Route::get('/', function () {
//    return 'Hello Worl';
//});
Route::get('/','IndexController@index');
Route::get('welcome', function(){
    return view ('welcome');
});
Route::get('/news','NewsController@index')->name('news-list');
Route::get('/news/{id}','NewsController@show')->name('news_show');
Route::get('/articles','ClauseController@list')->name('articles-list');
Route::get('/test', function () {
    return view('frontend.test');
});
Route::get('/log','UserController@show' )->name('userinfo');
Route::get('/exit','UserController@exit')->name('exit');

Route::get('/auto', function () {
    return view('frontend.Auto');
});
Route::post('/updateimg','UserController@updateimg')->name('update-image');
Route::get('/register', function () {
    return view('frontend.register');
});
Route::post('/register','UserController@register');
Route::post('/logging','UserController@logging');

Route::get('/check', 'TestController@index');
Route::post('/posts','TestController@insert');
Route::post('/products/update/{id}','TestController@update');
//Route::post('check','TestController@index');
Route::get('/delete/{id}','TestController@delete');
Route::get('/trening',function (){
    return view ('frontend.trening');
});
Route::post('/search','TestController@search');

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

