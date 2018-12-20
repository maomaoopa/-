<?php

namespace App\Http\Middleware;

use Closure;

class Globals
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $ip = $request->ip();
        $method = $request->method();

        $str = '['.date('Y-m-d H:i:s',time()).'],ip地址:'.$ip.',请求方式'.$method."\r\n";

        file_put_contents('./cons.txt',$str,FILE_APPEND);
        return $next($request);
    }
}
