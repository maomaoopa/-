<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Ad;
use DB;
use App\Http\Requests\AdRequest;

class AdController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = DB::table('ads')->where(function($query) use($request){

             $name = $request->input('aname');
        if(!empty($name)) {
                    $query->where('aname','like','%'.$name.'%');
                }

        })->paginate(4);

        return View('admin.ad.index',['title'=>'广告管理','res'=>$res,'request'=>$request]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('admin.ad.add',['title'=>'广告添加']);
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
            ['aname' => 'required',
            'content'=>'required',
            'apic'=>'required'
            ],[
                'aname.required' => '广告名字不能为空',
                'content.required'=>'广告内容不能为空',
                'apic.required'=>'广告图片不能为空'
            ]);

        $res = $request->except('_token','apic');

        $res['addtime']=time();
        
        if($request->hasFile('apic')){
            //自定义名字
            $name = rand(111,999).time();
            //获取后缀
            $aa = $request->file('apic')->getClientOriginalExtension();

            $request->file('apic')->move('./uploads',$name.'.'.$aa);

            $res['apic'] = '/uploads/'.$name.'.'.$aa;

        }
        //存入数据库
        try{

            $data =Ad::create($res);
            
            if($data){
                return redirect('/admin/ad')->with('success','添加成功');
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
        $res = Ad::find($id);
        
        return view('admin.ad.edit',[
            'title'=>'广告修改',
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
            ['aname' => 'required',
            'content'=>'required',
            'apic'=>'required'
            ],[
                'aname.required' => '广告名字不能为空',
                'content.required'=>'广告内容不能为空',
                'apic.required'=>'广告图片不能为空'
            ]);

        $res = $request->except('_token','apic','_method');

        if($request->hasFile('apic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $aa = $request->file('apic')->getClientOriginalExtension();

            $request->file('apic')->move('./uploads',$name.'.'.$aa);

            $res['apic'] = '/uploads/'.$name.'.'.$aa;

        }

        //数据表修改数据
        try{

            $data =Ad::where('aid', $id)->update($res);
            
            if($data){
                return redirect('/admin/ad')->with('success','修改成功');
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

            $rs = Ad::destroy($id);
            
            if($rs){
                return redirect('/admin/ad')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
