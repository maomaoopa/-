<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Config;
use DB;

class ConfigController extends Controller
{
	public function index(){
		$config = Config::first();

    	//dd($config);
    	return view('/admin/config/index',['title'=>'网站配置','config'=>$config]);
	}

	public function update(Request $request)
	{
		$res = $request->only('state');

        try{

            $data = Parts::where('id',$id)->update($res);
            
            if($data !== null){
                return back()->with('success','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
	}
    
}
