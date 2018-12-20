<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ucpaas;
use DB;

class RegisterController extends Controller
{
    //
    public function register()
    {

    	//登录页面
    	return view('home.register',['title'=>'注册']);
    }

    public function ajaxphone(Request $request)
    {
    	//接收ajax
    	$number = $request->post('number');
        // echo $number;die;
    	//初始化必填
		$options['accountsid']='535ccd26dff2f942bc0be81cbdb57943';
		$options['token']='5477b51b39c358c8a3f5b93f841df63b';
		//初始化 $options必填
		$ucpass = new Ucpaas($options);

		$code = rand(111111,999999);
		

		// $ucpass->getDevinfo('xml');
		//session
		session(['key'=>$code]);

		$appId = "173e79f05b244ba08ff4383edc5b2988";
		// $to = "13911373063";
		$templateId = "405388";
		// $param=$code;

		$ucpass->templateSMS($appId,$number,$templateId,$code);

        echo $code;
    }

   	public function doregister(Request $request)
    {

        //处理注册页面
        $code = $request->get('code');
        // dump($code);die;
        $cd = session('key'); 
		// dump($cd);die;
        //比较   跟手机收到的验证码作比较

	 	$res = $request->except('_token','code');

    	// var_dump($res);die;

    	$rs = DB::table('user_name')->insert($res);

    	return redirect('/home/nlogin');

    }
}
