<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CarController extends Controller
{
    //
    public function cart(Request $request){

    	$res = DB::table('car')->where(function($query) use($request){

        $cname = $request->input('cname');

        if(!empty($cname)) {
                    $query->where('cname','like','%'.$cname.'%');
                }

        })->paginate(4);

    	return view('/admin/car/shoping',['title'=>'后台购物车','res'=>$res]); 
    }
}
