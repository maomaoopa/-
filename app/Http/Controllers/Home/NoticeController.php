<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NoticeController extends Controller
{
    //
    public function gg()
    {
    	$rs= DB::table('notices')->get();

        $fri= DB::table('fris')->get();
    	
    	return view('home.notice.notices',['title'=>'公告','rs'=>$rs,'fri'=>$fri]);
    }

    public function not(Request $request)
    {	
    	$id = $request->nid;

    	echo $id;
	}
    public function ajax(Request $request)
    {
        $nid = $request ->nid;
        $data = DB::table('notices')->where('nid',$nid)->get();
        // dd($data);
        // $datcon = $data->content;
        // dd($datcon);
        return $data;
    }
}
