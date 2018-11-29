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

Route::get('/', function () {
    return view('home.welcome');
});



//后台
Route::group([], function(){

	//后台的首页
	Route::get('/admin', 'Admin\IndexController@index');
	//后台的公告管理
	Route::resource('/admin/notice',"Admin\NotController");
	//后台的广告管理
	Route::resource('/admin/ad',"Admin\AdController");
	//后台的友情链接
	Route::resource('/admin/fri',"Admin\FriController");
	
});


//前台
Route::group([], function(){

	//前台的首页
	Route::get('/home', 'Home\IndexController@index');

	
});
