<?php

/**
 * 首页、关于页等.
 */
Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/error', function () {
    return view('errors.503');
});

Auth::routes();

/*
 * 文章
 */
Route::group(['prefix' => 'articles'], function () {
    Route::get('/', 'ArticlesController@index');
    Route::get('/tag/{tag}', 'ArticlesController@tag');
    Route::get('/show/{id}.html', 'ArticlesController@show');
});

/*
 * 需要用户权限的路由
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/articles/create', 'ArticlesController@create');
    Route::post('/articles/store', 'ArticlesController@store');
    Route::get('/articles/edit/{id}', 'ArticlesController@edit');
    Route::post('/articles/update/{id}', 'ArticlesController@update');
    Route::post('/articles/cover/upload', 'ArticlesController@cover');
    Route::post('/files/upload', 'FilesController@upload');
});
