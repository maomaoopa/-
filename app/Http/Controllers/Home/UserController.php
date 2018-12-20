<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return view('home.message',[

            'title'=>'我的信息'

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
        
        return view('home.user.index',['title'=>'个人资料']);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return view('home.user.adress',['title'=>'收货地址']);
    }


     public function pchange(Request $request)
    {

        return view('home.user.pchange',['title'=>'修改密码']);
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
        //获取上传的文件对象
        $file = $request->file('img');
        //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1111,9999).'.'.$entension;
            //移动文件---
            $path = $file->move('./uploads',$newName);

            $filepath = '/uploads/'.$newName;

            $res['img'] = $filepath;
            DB::table('user_name')->where('id',session('uid'))->update($res);
            //返回文件的路径
            // return  $filepath;
            return redirect('/home/user');
        }
    }

}
