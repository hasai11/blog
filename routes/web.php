<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Admin\IndexController@index');


Route::get('/admin/login','Admin\LoginController@index');
Route::get('code/captcha/{id}','Admin\LoginController@captcha');
Route::post('admin/dologin','Admin\LoginController@doLogin');


Route::group(['prefix'=>'admin','namespace'=>'Admin'/*,'middleware'=>'login'*/],function(){

//后台首页
    Route::get('index','IndexController@index');

//分类资源路由
    Route::resource('cate','CateController');

//添加子分类路由
    Route::get('cate/create/{id}','CateController@create');
//重置密码
    Route::get('resetpass/{id}','ResetpassController@index');
    Route::post('dorepass','ResetpassController@dorepass');
    Route::get('index/logout','ResetpassController@index');

//退出登录
    Route::get('/index/logout','IndexController@logout');
});
