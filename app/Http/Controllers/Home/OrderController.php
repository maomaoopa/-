<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Car;
use DB;

class OrderController extends Controller
{
    //
    public function order(Request $request)
    {
    	$id = $request->except('_token');
    	//dd($id);
    	
    	$res = Car::where('id',$id)->first();

    	// dump($res);
    	return view('home.orders.order',['title'=>'商品订单','res'=>$res]);
    }


     public function ajax(Request $request)
    {
    	// $id = $request->all();
    	//dd($id);
    	$res = $request->get("checkId");
    	echo $res;
    }

}
