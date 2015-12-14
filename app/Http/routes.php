<?php


Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/about', 'PagesController@about');

Route::resource('articles', 'ArticlesController');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AdminController@login');
    Route::get('/register', 'AdminController@register');
    Route::post('/handleLogin', 'AdminController@handleLogin');
    Route::post('/handleLogin', 'AdminController@handleLogin');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/index', 'AdminController@index');
});