<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Chart;
use DB;
use App\Http\Requests\ChartRequest;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $res = DB::table('slideshows')->where(function($query) use($request){

             $sname = $request->input('sname');
        if(!empty($sname)) {
                    $query->where('sname','like','%'.$sname.'%');
                }

        })->paginate(4);
       
        return view('admin.chart.index',['title'=>'轮播图列表','res'=>$res,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.chart.add',['title'=>'轮播图添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

            $this->validate($request, [
            'sname' => 'required',
            'pic'=>'required',
            'descript'=>'required'
        ],[
            'sname.required' => '轮播图名不能为空',
            'pic.required'=>'请上传图片',
            'descript.required'=>'轮播图内容不能为空'
        ]);

        $res = $request->except('_token','pic');

         if($request->hasFile('pic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./uploads',$name.'.'.$suffix);

            $res['pic'] = '/uploads/'.$name.'.'.$suffix;



        }
        //存入数据库
        try{

            $data = Chart::create($res);
            
            if($data){
                return redirect('/admin/chart')->with('success','添加成功');
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
        $res = Chart::find($id);

        return view('admin.chart.edit',[
            'title'=>'轮播图的修改页面',
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

            $this->validate($request, [
            'sname' => 'required',
            'pic'=>'required',
            'descript'=>'required'
        ],[
            'sname.required' => '轮播图名不能为空',
            'pic.required'=>'请上传图片',
            'descript.required'=>'轮播图内容不能为空'
        ]);

        $res = $request->except('_token','pic','_method');

        if($request->hasFile('pic')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./uploads',$name.'.'.$suffix);

            $res['pic'] = '/uploads/'.$name.'.'.$suffix;

        }

        //数据表修改数据
        try{

            $data = Chart::where('sid', $id)->update($res);
            
            if($data){
                return redirect('/admin/chart')->with('success','修改成功');
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

            // $res = Chart::find($id);
            // $path1 = $res->pic;
           
            // unlink($path1);

            try{

            $rs = Chart::destroy($id);
            
            if($rs){
                return redirect('/admin/chart')->with('success','删除成功');
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

        $res['sname'] = $request->uv;

        //修改数据
        $data = Chart::where('sid',$id)->update($res);

        if($data){

            echo 1;
        } else {

            echo 0;
        }


    }
}
