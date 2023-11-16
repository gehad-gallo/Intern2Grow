<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'App\Http\Controllers\Api'], function(){
	Route::get('/articles/{id}','ArticleController@getAllArticles')->name('api.all.articles');
	Route::post('/add-article','ArticleController@storeNewArticle')->name('api.add.article');
	Route::post('/edit-article/{user_id}/{article_id}','ArticleController@updateArticle')->name('api.update.article');
	Route::delete('/delete-article/{id}','ArticleController@deleteArticle')->name('api.delete.article');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
