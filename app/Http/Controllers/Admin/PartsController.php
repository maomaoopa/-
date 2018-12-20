<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Parts;
use DB;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res =Parts::select(DB::raw('*,CONCAT(path,tid) as paths'))->where('pname','like','%'.$request->pname.'%')->
        orderBy('paths')->
        paginate($request->input('num',10));

        foreach($res as $v){

            //path  
            $ps = substr_count($v->path,',');
            // dump($ps);die;

            //拼接  分类名
            // $v->pname = str_repeat('|--',$ps).$v->pname;

            $v->pname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->pname;

        }

        return view('admin.parts.index',[
            'title'=>'分类列表',
            'request'=>$request,
            'res'=>$res

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $rs = DB::select('select *,CONCAT(path,id) as paths from category order by paths');
        //查询表里面的信息
        $rs = Parts::select(DB::raw('*,CONCAT(path,tid) as paths'))->
        orderBy('paths')->
        get();


        foreach($rs as $v){

            //path  
            $ps = substr_count($v->path,',');

            //拼接  分类名
            // $v->pname = str_repeat('|--',$ps).$v->pname;

            $v->pname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->pname;

        }

        // select *,CONCAT(path,id) as paths from category order by paths

        return view('admin.parts.create',[
            'title'=>'分类添加页面',
            'rs'=>$rs
        ]);
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

        //
        /*$res = $request ->all();
        dd($res);
        die;*/
        $res = $request->except('_token');

        if($request->pid == '0'){

            $res['path'] = '0,';

        } else {
            //查询数据
            $rs = DB::table('parts')->where('tid',$request->pid)->first();
            // path.id       0, 1,

            $res['path'] = $rs->path.$rs->tid.',';

        }


        //往数据表里面进行添加
        try{

            $data = Parts::create($res);
            
            if($data){
                return redirect('/admin/parts')->with('success','添加成功');
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
   public function edit($tid)
    {
        //

        $rs = Parts::select(DB::raw('*,CONCAT(path,tid) as paths'))->
        orderBy('paths')->
        get();

        // 家用电器
        // '|--'.电视

        foreach($rs as $v){

            //path  
            $ps = substr_count($v->path,',');

            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->pname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->pname;

        }

        $res = Parts::find($tid);

        return view('admin.parts.edit',[
            'title'=>'分类修改页面',
            'res'=>$res,
            'rs'=>$rs
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tid)
    {
        //
        $res = $request->only('status','pname');

        try{

            $data = Parts::where('tid',$tid)->update($res);
            
            if($data !== null){
                return redirect('/admin/parts')->with('success','修改成功');
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
    public function destroy($tid)
    {
        
        try{

            $res = Parts::destroy($tid);
            
            if($res){
                return redirect('/admin/parts')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
