<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class IssueController extends Controller
{
    //
    public function ii()
    {
    	$ly= DB::table('users')->get();

        $fri= DB::table('fris')->get();
    	
    	return view('home.issue.issues',['title'=>'留言反馈','ly'=>$ly,'fri'=>$fri]);
    }

    public function iss(Request $request)
    {	
    	$id = $request->uid;

    	echo $id;
	}
}
