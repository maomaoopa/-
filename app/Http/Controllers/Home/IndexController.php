<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Parts;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;
use App\Model\Admin\config;
use DB;
class IndexController extends Controller
{
    //
    public function index(){

    	$res= DB::table('slideshows')->get();
    	$parts = Parts::get();
    	$part = Parts::get();
    	$goods = Parts::get();
    	$good  = Goods::get();

        $not= DB::table('notices')->get();

        $adv= DB::table('ads')->get();
        
        $fri= DB::table('fris')->get();


    	$goodsimg = Goodsimg::get();

    	//dd($good);
    	return view('home/index',[
    		'title'=>'前台首页',
    		'res'=>$res,
    		'parts'=>$parts,
    		'part'=>$part,
    		'goods'=>$goods,
    		'good'=>$good,
    		'goodsimg'=>$goodsimg,
            'not'=>$not,
            'fri'=>$fri,
            'adv'=>$adv
    	]);
    }

   
}
