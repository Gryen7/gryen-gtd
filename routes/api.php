<?php

use Illuminate\Http\Request;

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

Route::middleware(['refresh.token'])->group(function() {
    Route::get('/currentUser', function (Request $request) {
        $currentUser = $request->user('api');

        if (!empty($currentUser)) {
            $currentUser->avatar = 'https://gw.alipayobjects.com/zos/rmsportal/BiazfanxmamNRoxxVxka.png';
        }

        return $currentUser;
    });
});

Route::post('/user/login', 'Api\UserController@login');

Route::get('/todos/list/{page?}', 'Api\TodosController@getList');

Route::get('/articles/list', 'Api\ArticlesController@moreArticles');

Route::get('/notices/wechat', 'Api\NoticesController@wechat');

Route::post('/pushtokindle', 'Api\PushToKindleController@index');

Route::get('/webarticle/get', 'Api\WebArticles@getArticleData');
Route::get('/webarticle/tpl', 'Api\WebArticles@webArticleTpl');