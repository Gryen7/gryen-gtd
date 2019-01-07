<?php

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

Route::middleware(['refresh.token'])->group(function () {
    Route::get('/currentUser', 'Api\UserController@currentUser');

    Route::get('/todos/count', 'Api\TodosController@count');
    Route::get('/todos/list', 'Api\TodosController@getList');
    Route::post('/todos/updateOrCreate', 'Api\TodosController@updateOrCreate');
    Route::post('/todos/update', 'Api\TodosController@updateTodo');
    Route::post('/todos/delete/{id}', 'Api\TodosController@deleteTodo');

    Route::post('/pushtokindle', 'Api\PushToKindleController@index');

    Route::get('/webarticle/get', 'Api\WebArticles@getArticleData');
    Route::get('/webarticle/tpl', 'Api\WebArticles@webArticleTpl');
});

Route::post('/user/login', 'Api\UserController@login');
Route::get('/articles/list', 'Api\ArticlesController@moreArticles');
Route::get('/notices/wechat', 'Api\NoticesController@wechat');
Route::post('/xmlrpc', 'Api\MetaWeblogController@index');
