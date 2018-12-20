<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use App\Model\Admin\Role;
use Hash;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //一个条件的搜索
        $res = User::where('username','like','%'.$request->username.'%')->paginate($request->input('num',2));


        return view('admin.user.index',[
            'res'=>$res,
            'request'=>$request,
            'title'=>'用户列表页'

            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create',['title'=>'添加管理员']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'username' => 'required|regex:/^\w{4,16}$/',
            'password' => 'required|regex:/^\S{6,12}$/',
            'repass'=>'same:password',
            'phone'=>'regex:/^1[3456789]\d{9}$/',
            'email'=>'email',
            'profile'=>'required'
        ],[
            'username.required' => '用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'password.required'  => '密码不能为空',
            'password.regex'  => '密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'phone.regex'=>'手机号码格式不正确',
            'email.email'=>'邮箱格式不正确',
            'profile.required'=>'请上传图片'
        ]);
        $res = $request->except('_token','profile','repass');

        if($request->hasFile('profile')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            $request->file('profile')->move('./uploads',$name.'.'.$suffix);

            $res['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        //网数据表里面添加数据  hash加密
        $res['password'] = Hash::make($request->password);

        //加密 解密
        // $res['password'] = encrypt($request->password);

        // dd($res);die;
        //存数据
        // User::create($res);
        
        try{

            $data = User::create($res);
            
            if($data){
                return redirect('/admin/user')->with('success','添加成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        //
        // 根据id获取数据
        $res = User::find($uid);

        return view('admin.user.edit',[
            'title'=>'用户的修改页面',
            'res'=>$res
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //表单验证
        $this->validate($request, [
            'username' => 'required|regex:/^\w{6,16}$/',
            'repass'=>'same:password',
            'phone'=>'regex:/^1[3456789]\d{9}$/',
            'email'=>'email',
            'profile'=>'required'
        ],[
            'username.required' => '用户名不能为空',
            'username.regex'=>'用户名格式不正确',
            'phone.regex'=>'手机号码格式不正确',
            'email.email'=>'邮箱格式不正确',
            'profile.required'=>'请选择头像'
        ]);
        $res = $request->except('_token','profile','_method');

        if($request->hasFile('profile')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            $request->file('profile')->move('./uploads',$name.'.'.$suffix);

            $res['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        //数据表修改数据
        try{

            $data = User::where('uid', $uid)->update($res);
            
            if($data){
                return redirect('/admin/user')->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        //
        //删除图片  头像
        //unlink

        try{

            $res = User::destroy($uid);
            
            if($res){
                return redirect('/admin/user')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }

    public function ajaxupdate(Request $request)
    {
        //判断空 

        //判断用户名是否一样

        //判断位数 6~12

        $res = [];

        $id = $request->ids;

        $res['username'] = $request->uv;

        //修改数据
        $data = User::where('uid',$uid)->update($res);

        if($data){

            echo 1;
        } else {

            echo 0;
        }
    }

     /**
     *  用户添加角色的页面
     *
     *  @return \Illuminate\Http\Response
     */
    public function user_role(Request $request)
    {
        //根据id查询用户
        $id = $request->id;

        $res = User::find($id);
        // dd($res);die;
        // dd($res->roles);die;
        // if($res->roles !== null){
        $info = [];
        foreach($res->roles as $k=>$v){

            $info[] = $v->id;
        }
        // }
        // dd($info);

        //查询所有的角色
        $roles = Role::all();


        return view('admin.user.user_role',[
            'title'=>'用户添加角色的页面',
            'res'=>$res,
            'roles'=>$roles,
            'info'=>$info
        ]);
    }

    /**
     *  Display a listing of the resource.
     *
     *  @return \Illuminate\Http\Response
     */
    public function do_user_role(Request $request)
    {
        $id = $request->id;

        $res = $request->role_id;

        // dd($res);die;
        //删除原来的角色
        DB::table('user_role')->where('user_id',$id)->delete();

        $arr = [];
        foreach($res as $k => $v){
            $rs = [];

            $rs['user_id'] = $id;
            $rs['role_id'] = $v;
            
            $arr[] = $rs;
        }

        //往数据表里面插入数据
        $data = DB::table('user_role')->insert($arr);

        if($data){

            return redirect('/admin/user')->with('success','添加成功');
        }
        
    }
    
    /**
     *  用户权限提示页面
     *
     *  @return \Illuminate\Http\Response
     */
    public function remind()
    {
        return view('admin.user.remind',['title'=>'用户权限提示页面']);
    }


}
