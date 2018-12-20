<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NloginController extends Controller
{
    //
    public function nlogin()
    {

    	//登录页面
    	return view('home.nlogin',['title'=>'登录 / 注册']);
    }

    public function donlogin(Request $request)
    {

    	//处理登录页面
        //判断用户名
        $rs = DB::table('user_name')->where('username',$request->username)->first();


        if(!$rs){

            return back()->with('error','用户名或者密码错误');
        }

        //存点信息  session
        session(['uid'=>$rs->id]);
        session(['uname'=>$rs->username]);

        return redirect('/');
    }

    public function lagout()
    {

        //退出登录
        //清空session
        session(['uid'=>'']);

        return redirect('/');
    }
}
