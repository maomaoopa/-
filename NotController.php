<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Notice;
use DB;
use App\Http\Requests\NoticeRequest;

class NotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //条件搜索
        $res = DB::table('notices')->where(function($query) use($request){

             $con = $request->input('content');
        if(!empty($con)) {
                    $query->where('content','like','%'.$con.'%');
                }

        })->paginate(4);

        return View('admin.notice.index',['title'=>'公告管理','res'=>$res,'request'=>$request]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('admin.notice.add',['title'=>'公告添加']);
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
        $this->validate($request, 
            ['content' => 'required'
            ],[
                'content.required' => '公告内容不能为空'
            ]);

        $res = $request->except('_token');

        //存入数据库
        try{

            $data =Notice::create($res);
            
            if($data){
                return redirect('/admin/notice')->with('success','添加成功');
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
        $res = Notice::find($id);
        
        return view('admin.notice.edit',[
            'title'=>'公告修改',
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
        $this->validate($request,['content' => 'required'],['content.required' => '公告内容不能为空']);

        $res = $request->except('_token','_method');

        //数据表修改数据
        try{

            $data =Notice::where('nid', $id)->update($res);
            
            if($data){
                return redirect('/admin/notice')->with('success','修改成功');
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

            $rs = Notice::destroy($id);
            
            if($rs){
                return redirect('/admin/notice')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }


    
}
