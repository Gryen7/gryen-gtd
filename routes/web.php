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
    Route::get('/show/{id}.html', 'ArticlesController@show');
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
    Route::post('/articles/cover/upload', 'ArticlesController@cover');

    Route::post('/files/upload', 'FilesController@upload');
});

/**
 * Control Panel
 */
Route::group(['prefix' => 'control', 'middleware' => 'auth'], function () {

    /* 控制面板首页 */
    Route::get('/', 'ControlPanelController@index');

    /* 任务管理 */
    Route::get('/todos/delete/{ids}', 'Control\ToDosController@delete');
    Route::post('/todos/status', 'Control\ToDosController@changeStatus');
    Route::post('/todos/date', 'Control\ToDosController@changeDate');
    Route::resource('/todos', 'Control\ToDosController');

    /* 文章管理 */
    Route::get('/articles', 'ControlPanelController@articles');
    Route::get('/articles/delete/{ids}', 'ArticlesController@delete');
    Route::get('/articles/destroy/{id}', 'ArticlesController@destroy');

    /* 评论管理 */
    Route::get('/comments', 'ControlPanelController@comments');

    /* 用户设置页面 */
    Route::get('/user', 'ControlPanelController@user');

    /* 设置首页 */
    Route::get('/settings', 'ControlPanelController@settings');

    /* 首页焦点图设置 */
    Route::get('/setting/banners', 'Control\SettingsController@banners');
    Route::post('/setting/banners/set', 'Control\BannersController@set');
    Route::post('/setting/banners/delete/{id}', 'Control\BannersController@delete');
    Route::post('/setting/banners/top/{id}', 'Control\BannersController@top');

    /* 后台站点相关设置 */
    Route::get('/setting/site', 'Control\SettingsController@site');
    Route::post('/setting/site/title', 'Control\SiteController@title');
    Route::post('/setting/site/subtitle', 'Control\SiteController@subTitle');
    Route::post('/setting/site/keywords', 'Control\SiteController@keywords');
    Route::post('/setting/site/description', 'Control\SiteController@description');
    Route::post('/setting/site/defaultimage', 'Control\SiteController@defaultImage');

    /* 后台图片管理相关 */
    Route::get('/setting/files', 'Control\FilesController@index');
    Route::get('/setting/files/list/{page}', 'Control\FilesController@getImageList');

    /* 回收站 */
    Route::get('/ashcan', 'ControlPanelController@ashcan');
});

Route::resource('comments','CommentsController');
