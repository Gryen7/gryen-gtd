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
    Route::get('/currentuser', 'Api\UserController@currentUser');

    Route::get('/articles/list', 'Api\ArticlesController@getList');
    Route::post('/articles/delete', 'Api\ArticlesController@delete');
    Route::post('/articles/restore', 'Api\ArticlesController@restore');
    Route::post('/articles/forcedelete', 'Api\ArticlesController@forceDelete');

    Route::get('/todos/count', 'Api\TodosController@count');
    Route::get('/todos/list', 'Api\TodosController@getList');
    Route::post('/todos/updateorcreate', 'Api\TodosController@updateOrCreate');
    Route::post('/todos/update', 'Api\TodosController@updateTodo');
    Route::post('/todos/delete/{id}', 'Api\TodosController@deleteTodo');

    Route::post('/banners/set', 'Api\BannersController@set');
    Route::delete('/banners/delete/{id}', 'Api\BannersController@delete');
    Route::post('/banners/top/{id}', 'Api\BannersController@top');
});

Route::post('/user/login', 'Api\UserController@login');
Route::get('/articles/list/{articleId}', 'Api\ArticlesController@moreArticles');
Route::post('/xmlrpc', 'Api\MetaWeblogController@index');
