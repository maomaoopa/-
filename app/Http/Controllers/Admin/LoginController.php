<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\Model\Admin\User;
use Session;
use DB;
use Hash;

class LoginController extends Controller
{
    //
    public function login()
    {
    	//登录页面
    	return view('admin.login',['title'=>'登录页面']);

    }

    public function dologin(Request $request)
    {
    	//处理登录信息
    	//判断用户名
    	$rs = DB::table('users')->where('username',$request->username)->first();


    	if(!$rs){

    		return back()->with('error','用户名或者密码错误');
    	}

    	//判断密码
    	//hash
    	if (!Hash::check($request->password, $rs->password)) {
		    
		    return back()->with('error','用户名或者密码错误');
		}

		//加密解密
		/*if($request->password != decrypt($rs->password)){

		    return back()->with('error','用户名或者密码错误');
			
		}*/

		//判断验证码
		$code = session('code');
		// dump($request->code);die;

		if($code != $request->code){
		    return back()->with('error','验证码错误');
		}

		//存点信息  session
		session(['uid'=>$rs->uid]);
		session(['uname'=>$rs->username]);

		return redirect('/admin');

    }

    public function captcha()
    {
    	//验证码
    	$phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 130, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }


    public function passchange(Request $request)
    {
        //修改密码
        /*if(!Hash::check ($request->input('oldpassword'),Auth()->user()->password)){

            session()->flash('danger','原密码不正确');
            return redirect ()->back();
        }
        $users=\Auth::user();
        $users->password=bcrypt($request->input('password'));
        $users->save();
        session()->flash('success','密码修改成功！');
        return redirect ('/admin');*/

    }

    public function profile()
    {

    	//把信息返回页面
    	return view('admin.profile',['title'=>'修改头像']);
    	
    }

    public function update(Request $request)
    {
		//修改头像
    	
    	//获取上传的文件对象
        $file = $request->file('profile');
        //判断文件是否有效
        if($file->isValid()){
        	//上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1111,9999).'.'.$entension;
            //移动文件
            $path = $file->move('./uploads',$newName);

            $filepath = '/uploads/'.$newName;

            $res['profile'] = $filepath;
            DB::table('users')->where('uid',session('uid'))->update($res);
            //返回文件的路径
            // return  $filepath;
            return redirect('/admin/user');
        }
    }

    public function logout()
    {
    	//退出登录
    	//清空session
    	session(['uid'=>'']);

    	return redirect('/admin/login');
    }
}
