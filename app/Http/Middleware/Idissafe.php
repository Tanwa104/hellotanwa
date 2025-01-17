<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Helper;
use Illuminate\Support\Facades\DB;
class Idissafe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $flag=0;
        $helps=Helper::get();
        $usertime = DB::table('timelines')
        ->join('helpers', 'helpers_id', '=', 'helpers.id')->get();
        foreach  ($helps as $help)
        {
        foreach($usertime as $time){
           
              if($time->helpers_id!=$help->id)
              {
               $flag=1;

              }
            }
        }          
    if($flag==1)
    {
        return redirect()->back()->with('msg','no one available');
    }
    if($flag==0)
    {
        return $next($request);
    }
    }
}
