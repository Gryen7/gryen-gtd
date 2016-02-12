<?php


Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/about', 'PagesController@about');

Route::get('/error',function(){
    return view('error');
});

Route::resource('articles', 'ArticlesController');

Route::group(['prefix' => 'user'], function () {
    Route::get('/index','UserController@index');
    Route::get('/login', 'UserController@login');
    Route::get('/register', 'UserController@register');
    Route::post('/handleLogin', 'UserController@handleLogin');
    Route::post('/handleRegister', 'UserController@handleRegister');
});
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', 'UserController@index');
    Route::get('/index', 'UserController@index');
});