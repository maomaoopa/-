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

//后台登录
Route::any('/admin/login','Admin\LoginController@login');
Route::any('/admin/dologin','Admin\LoginController@dologin');
Route::any('/admin/captcha','Admin\LoginController@captcha');


//后台
Route::group([], function(){

	//后台的首页
	Route::get('/admin', 'Admin\IndexController@index');

	//后台个人中心
	//修改头像
	Route::any('/admin/profile','Admin\LoginController@profile');
	Route::any('/admin/update','Admin\LoginController@update');
	//修改密码
	Route::any('/admin/passchange','Admin\LoginController@passchange');
	//退出
	Route::any('/admin/logout','Admin\LoginController@logout');

	//后台用户管理
	Route::resource('/admin/user',"Admin\UserController");
	Route::get('/admin/userajax','Admin\UserController@ajaxupdate');
	//后台角色管理
	Route::resource('/admin/role',"Admin\RoleController");
	Route::resource('/admin/permission',"Admin\PermissionController");

	//后台的轮播图管理
	Route::resource('admin/chart',"Admin\ChartController");
	Route::get('/admin/usajax','Admin\ChartController@ajaxupdate');

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
