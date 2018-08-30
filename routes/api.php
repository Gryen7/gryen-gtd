<?php

use Illuminate\Http\Request;

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
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/user/login', 'Api\UserController@login');

Route::get('/todos/list/{page?}', 'Api\TodosController@getList');

Route::get('/articles/list', 'Api\ArticlesController@moreArticles');

Route::get('/notices/wechat', 'Api\NoticesController@wechat');

Route::post('/pushtokindle', 'Api\PushToKindleController@index');
