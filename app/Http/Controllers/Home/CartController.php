<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Car;

class CartController extends Controller
{
    //
    public function cars()
    {	
    

    	$res= DB::table('car')->get();


    	return view('home.shop.shopcar',[
    		'title'=>'购物车',
    		'res'=>$res
    	]);
    }

    public function shopcart(Request $request)
    {	
    	$id = $request->gid;

    	 //echo $id;

    	$res = DB::table('car')->where('id',$id)->delete();

    	//$count = DB::table('cart')->count();

    	if($res){

    		echo 1;
    	} else {

    		echo 0;
    	}
    }


    public function add(Request $request)
    {

    //$res = $request->all();

    $id = $request->all('id');

    $res = DB::table('goods')->where('gid',$id)->first();

    $pic = DB::table('goodsimg')->where('gid',$id)->first();

    $tp = $pic->gimg;
   // dd($tp);
    $ns = [];

    $ns['color'] = $res->color;

    $ns['cname'] = $res->goods; 

    $ns['size'] = $res->size;

    $ns['price'] = $res->price;
    
    $ns['status'] = '1';

    $ns['addtime'] = '2018-12-18';

    $ns['gs'] = '1';

    $ns['zj'] = '999';

    $ns['gimg'] = $tp;

            //存入数据库
        try{

            $data = Car::create($ns);
            
            if($data){
                return redirect()->with('success','添加成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');
        }

    //dump($ns);
    



    }


    public function ck(Request $request)
    {
    $id = $request->all('id');

    $ns = DB::table('goods')->where('gid',$id)->first();

    $pic = DB::table('goodsimg')->where('gid',$id)->first();

    $tp = $pic->gimg;

    $res = [];

    $res['color'] = $ns->color;

    $res['cname'] = $ns->goods; 

    $res['size'] = $ns->size;

    $res['price'] = $ns->price;
    
    $res['status'] = '1';

    $res['addtime'] = '2018-12-18';

    $res['gs'] = '1';

    $res['zj'] = '999';

    $res['gimg'] = $tp; 

    //dd($res);

    return view('home.orders.orders',['title'=>'商品订单','res'=>$res]);
    }
}
