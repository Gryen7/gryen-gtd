<?php

/**
 * 首页、关于页等
 */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/error', function () {
    return view('errors.503');
});

/**
 * 文章
 */

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', 'ArticlesController@index');
    Route::get('/index', 'ArticlesController@index');
    Route::get('/list', 'ArticlesController@index');
    Route::get('/show/{id}', 'ArticlesController@show');
});

/**
 * 搜索
 */
Route::group(['prefix' => 'searches'], function () {
    Route::get('/search', 'SearchesController@search');
});

/**
 * 需要用户登录的页面
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/articles/create', 'ArticlesController@create');
    Route::post('/articles/store', 'ArticlesController@store');
    Route::get('/articles/edit/{id}', 'ArticlesController@edit');
    Route::post('/articles/update/{id}', 'ArticlesController@update');
    Route::get('/articles/delete/{ids}', 'ArticlesController@delete');
    Route::get('/articles/destroy/{id}', 'ArticlesController@destroy');

    Route::post('/files/upload', 'FilesController@upload');
});

/**
 * Control Panel
 */
Route::group(['prefix' => 'control', 'middleware' => 'auth'], function () {
    Route::get('/', 'ControlPanelController@index');
    Route::get('/index', 'ControlPanelController@index');
    Route::get('/articles/{page}', 'ControlPanelController@articles');
    Route::get('/comments', 'ControlPanelController@comments');
    Route::get('/todolist', 'ControlPanelController@todolist');
    Route::get('/user', 'ControlPanelController@user');
    Route::get('/settings', 'ControlPanelController@settings');
    Route::get('/ashcan', 'ControlPanelController@ashcan');
});

Route::resource('comments','CommentsController');

Route::resource('todos', 'ToDosController');
