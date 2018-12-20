<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Parts;
use DB;

use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = Goods::orderBy('gid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $gname = $request->input('goods');
               
                //如果用户名不为空
                if(!empty($gname)) {
                    $query->where('goods','like','%'.$goods.'%');
                }
              
            })
        ->paginate($request->input('num', 10));

        return view('admin.goods.index',[
            'title'=>'商品的列表页',
            'res'=>$res,
            'request'=>$request
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
        $rs = Parts::select(DB::raw('*,CONCAT(path,tid) as paths'))->
        orderBy('paths')->
        get();

        foreach($rs as $v){

            $ps = substr_count($v->path,',');
            //拼接  分类名

            $v->pname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->pname;
        }

        return view('admin.goods.create',[
            'title'=>'商品的添加页面',
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
        // dd($request);die;
        $res = $request->except('_token','gimg');

        //添加数据
        $rs = Goods::create($res);

        $gid = $rs->gid;

        //模型关联  一对多
        if($request->hasFile('gimg')){

            $file = $request->file('gimg'); //$_FILES

            $arr = [];
            foreach($file as $k => $v){

                $ar = [];

                $ar['gid'] = $gid;

                //设置名字
                $name = rand(1111,9999).time();

                //后缀
                $suffix = $v->getClientOriginalExtension();

                //移动
                $v->move('./uploads', $name.'.'.$suffix);

                $ar['gimg'] = '/uploads/'.$name.'.'.$suffix;

                $arr[] = $ar;

                

                //这是第二种方式
                // $sd = [];

                // $sd=['gid'=>$id,'gimd'=>'/uploads/'.$name.'.'.$suffix];

                // array_push($arr,$sd);
            }
        }

        //插入数据

        //一对多
        $data = Goods::find($gid);
        try{

            $gs = $data->gis()->createMany($arr);
            
            if($gs){
                return redirect('/admin/goods')->with('success','添加成功');
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
    public function show($gid)
    {
        //
        // $res = Goodsimg::where('id',$id)->delete();

        $res = Goodsimg::destroy($gid);

        if($res){

            echo 1;
        } else {

            echo 0;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gid)
    {
        //
        $rs = Parts::select(DB::raw('*,CONCAT(path,tid) as paths'))->
        orderBy('paths')->
        get();

        foreach($rs as $v){

            $ps = substr_count($v->path,',') ;
            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->pname = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->pname;
        }

        $res = Goods::find($gid);

        $gimgs = Goodsimg::where('gid',$gid)->get();

        return view('admin.goods.edit',[
            'title'=>'商品的修改页面',
            'rs'=>$rs,
            'res'=>$res,
            'gimgs'=>$gimgs

        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gid)
    {
        //表单验证

        $rs = Goodsimg::where('gid',$gid)->get();
        // dump($rs);die;

       /* foreach($rs as $v){

            unlink('.'.$v->gimg);
        }
*/
        // dump($request);die;
        $res = $request->except('_token','_method','gimg');

        $data = Goods::where('gid',$gid)->update($res);

        //关联表的信息
        if($request->hasFile('gimg')){

            $file = $request->file('gimg'); //$_FILES

            $arr = [];
            foreach($file as $k => $v){

                $ar = [];

                $ar['gid'] = $gid;

                //设置名字
                $name = rand(1111,9999).time();

                //后缀
                $suffix = $v->getClientOriginalExtension();

                //移动
                $v->move('./uploads', $name.'.'.$suffix);

                $ar['gimg'] = '/uploads/'.$name.'.'.$suffix;

                $arr[] = $ar;
            }
        }

        $rs = Goodsimg::where('gid',$gid)->insert($arr);


        if($rs){

            return redirect('/admin/goods')->with('success','修改成功');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gid)
    {

        //
        // 根据id获取图片路径  删除图片

        //根据id  删除商品信息 
        $goodsimg = Goodsimg::where('gid',$gid)->first();
        $id = $goodsimg->id;
        

        //在删除关联表里面的信息
        try{

            $res = Goods::destroy($gid);
            $goodsimg = Goodsimg::destroy($id);
            
            if($res && $goodsimg){
                return redirect('/admin/goods')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
    
}
