<?php

use Illuminate\Support\Facades\Route;

/**
 * 首页、关于页等.
 */
Route::redirect('/', '/articles');
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();
Route::feeds();

Route::redirect('/articles/show/37.html', 'https://notes.gryen.com/articles/show/267.html', 301);
Route::redirect('/articles/show/36.html', 'https://notes.gryen.com/articles/show/269.html', 301);
Route::redirect('/articles/show/31.html', 'https://notes.gryen.com/articles/show/271.html', 301);
Route::redirect('/articles/show/29.html', 'https://notes.gryen.com/articles/show/273.html', 301);
Route::redirect('/articles/show/28.html', 'https://notes.gryen.com/articles/show/275.html', 301);
Route::redirect('/articles/show/26.html', 'https://notes.gryen.com/articles/show/277.html', 301);
Route::redirect('/articles/show/25.html', 'https://notes.gryen.com/articles/show/279.html', 301);
Route::redirect('/articles/show/24.html', 'https://notes.gryen.com/articles/show/282.html', 301);
Route::redirect('/articles/show/23.html', 'https://notes.gryen.com/articles/show/284.html', 301);
Route::redirect('/articles/show/22.html', 'https://notes.gryen.com/articles/show/286.html', 301);
Route::redirect('/articles/show/18.html', 'https://notes.gryen.com/articles/show/288.html', 301);
Route::redirect('/articles/show/12.html', 'https://notes.gryen.com/articles/show/290.html', 301);
Route::redirect('/articles/show/11.html', 'https://notes.gryen.com/articles/show/292.html', 301);
Route::redirect('/articles/show/10.html', 'https://notes.gryen.com/articles/show/296.html', 301);
Route::redirect('/articles/show/7.html', 'https://notes.gryen.com/articles/show/298.html', 301);
Route::redirect('/articles/show/6.html', 'https://notes.gryen.com/articles/show/300.html', 301);
Route::redirect('/articles/show/5.html', 'https://notes.gryen.com/articles/show/302.html', 301);

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
    Route::get('/articles/edit/{id}', 'ArticlesController@edit');
    Route::post('/articles/store', 'ArticlesController@store');
    Route::post('/articles/update/{id}', 'ArticlesController@update');
    Route::post('/articles/updatestatus', 'ArticlesController@updateStatus');
    Route::post('/articles/cover/upload', 'ArticlesController@cover');
    Route::post('/files/upload', 'FilesController@upload');
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard.home');
    });
});
