<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
class RestrictIpAddressMiddleware
{
    public $restrictedIp =['127.0.0.1','3334','77777'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
       
    public function handle(Request $request, Closure $next)
    {
      

        $mains=Db::table('maintenances')->where('status',1)->select('ip_address')->get();    
      
        foreach($mains as $r){
        if(in_array($request->ip(),array($r->ip_address))) {
           
            return Response(view('maintain'));
            return response()->json(['message' => "You are not allowed to access this site."]);
        }
        
    }
    
        return $next($request);
    }
}
