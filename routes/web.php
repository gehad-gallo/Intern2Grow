<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/register','App\Http\Controllers\RegisterController@index')->name('register');
Route::post('/register','App\Http\Controllers\RegisterController@postRegister')->name('post.register');



Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'guest'], function () {	    
	Route::get('/login','LoginController@index')->name('login');
	Route::post('/login', 'LoginController@postLogin')-> name('post.login');
});


Route::group(['namespace' => 'App\Http\Controllers','middleware' => 'auth'],function(){
	Route::get('/home','HomeController@index')->name('home');
	Route::get('/profile','HomeController@myProfile')->name('my.profile');
	Route::get('/logout','HomeController@logOut')->name('logout');
});