<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Parts;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
use DB;
class SpxqController extends Controller
{
    public function list($id)
    {       
        $goods = Goods::find($id);
        $goodsimg = Goodsimg::where('gid',$id)->get();
        $first = $goodsimg[0];
        $tid = $goods->tid;
        $parts = Parts::where('tid',$tid)->first();
       //dd($parts);
        return view('home.spxq.index',[
            'title'=>'商品详情',
            'goods'=>$goods,
            'goodsimg'=>$goodsimg,
            'first'=>$first,
            'parts'=>$parts
        ]);
    }

   
}