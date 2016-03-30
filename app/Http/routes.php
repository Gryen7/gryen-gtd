<?php

/**
 * 首页、关于页等
 */
Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/about', 'PagesController@about');

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
    Route::get('/search/{keywords}', 'SearchesController@search');
});
/**
 * 用户
 */
Route::group(['prefix' => 'user'], function () {
    Route::get('/index', 'UserController@index');
    Route::get('/login', 'UserController@login');
    Route::get('/register', 'UserController@register');
    Route::get('/logout', 'UserController@logout');
    Route::post('/handleLogin', 'UserController@handleLogin');
    Route::post('/handleRegister', 'UserController@handleRegister');
});

/**
 * 需要用户登录的页面
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/', 'UserController@index');
    Route::get('/user/index', 'UserController@index');

    Route::get('/articles/create', 'ArticlesController@create');
    Route::post('/articles/store', 'ArticlesController@store');
    Route::get('/articles/edit/{id}', 'ArticlesController@edit');
    Route::post('/articles/update/{id}', 'ArticlesController@update');

    Route::post('/files/upload', 'FilesController@upload');
});