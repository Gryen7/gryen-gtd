<?php
Route::get('/about','PagesController@about');
Route::resource('articles','ArticlesController');
Route::group(['prefix' => 'admin'] , function(){
    Route::get('/login' , 'AdminController@login');
    Route::get('/register' , 'AdminController@register');
});
Route::group(['prefix' => 'admin' , 'middleware' => 'auth'] ,function(){
    Route::get('/' , 'AdminController@index');
    Route::get('/index' , 'AdminController@index');
});