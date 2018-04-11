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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/admin/login','Admin\LoginController@index');
Route::get('code/captcha/{id}','Admin\LoginController@captcha');
Route::post('admin/dologin','Admin\LoginController@doLogin');


Route::group(['prefix'=>'admin','namespace'=>'Admin'/*,'middleware'=>'login'*/],function(){

//后台首页
    Route::get('index','IndexController@index');

//退出登录
    Route::get('logout','IndexController@logout');
});
