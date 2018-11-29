<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Fri;
use DB;
use App\Http\Requests\FriRequest;

class FriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = DB::table('fris')->where(function($query) use($request){

             $ftitle = $request->input('ftitle');
        if(!empty($ftitle)) {
                    $query->where('ftitle','like','%'.$ftitle.'%');
                }

        })->paginate(4);

        return View('admin.fri.index',['title'=>'友情链接管理','res'=>$res,'request'=>$request]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('admin.fri.add',['title'=>'友情链接添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, 
            ['ftitle' => 'required',
            'descript'=>'required',
            'url'=>'required',
            'tp'=>'required'
            ],[
                'ftitle.required' => '友情链接标题不能为空',
                'descript.required'=>'友情链接描述不能为空',
                'url.required'=>'友情链接地址不能为空',
                'tp.required'=>'友情链接图片不能为空'
            ]);

        $res = $request->except('_token','tp');
        
        if($request->hasFile('tp')){
            //自定义名字
            $name = rand(111,999).time();
            //获取后缀
            $aa = $request->file('tp')->getClientOriginalExtension();

            $request->file('tp')->move('./uploads',$name.'.'.$aa);

            $res['tp'] = '/uploads/'.$name.'.'.$aa;

        }
        //存入数据库
        try{

            $data =Fri::create($res);
            
            if($data){
                return redirect('/admin/fri')->with('success','添加成功');
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
    public function edit($id)
    {
        //
        $res = Fri::find($id);
        
        return view('admin.fri.edit',[
            'title'=>'友情链接修改',
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
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, 
            ['ftitle' => 'required',
            'descript'=>'required',
            'url'=>'required',
            'tp'=>'required'
            ],[
                'ftitle.required' => '友情链接标题不能为空',
                'descript.required'=>'友情链接描述不能为空',
                'url.required'=>'友情链接地址不能为空',
                'tp.required'=>'友情链接图片不能为空'
            ]);

        $res = $request->except('_token','tp','_method');

        if($request->hasFile('tp')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $aa = $request->file('tp')->getClientOriginalExtension();

            $request->file('tp')->move('./uploads',$name.'.'.$aa);

            $res['tp'] = '/uploads/'.$name.'.'.$aa;

        }

        //数据表修改数据
        try{

            $data =Fri::where('fid', $id)->update($res);
            
            if($data){
                return redirect('/admin/fri')->with('success','修改成功');
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
    public function destroy($id)
    {
        //
        try{

            $rs = Fri::destroy($id);
            
            if($rs){
                return redirect('/admin/fri')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}