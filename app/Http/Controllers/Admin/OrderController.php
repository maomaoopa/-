<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    //
    public function orders(Request $request){

    	$res = DB::table('car')->where(function($query) use($request){

        $cname = $request->input('cname');

        if(!empty($cname)) {
                    $query->where('cname','like','%'.$cname.'%');
                }

        })->paginate(4);

    	return view('/admin/order/orderp',['title'=>'后台订单','res'=>$res]); 

        echo 'ss';
    }
}
