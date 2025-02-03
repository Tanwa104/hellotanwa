<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Nannyreq;
use App\Models\Cookreq;
use App\Models\Proposal;
use Illuminate\Http\Request;

class PropUserController extends Controller
{
    public function propuser()
    {
return view('propcussel');

      
        

}
    public function propuserview(Request $request)
    {
        $uid=auth()->user()->id;
        $roles=$request->role;
        if($roles=='Housecleaner')
        {
            $users = DB::table('createseva')
            ->leftJoin('users', 'users.id', '=', 'createseva.user_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','Housecleaner')
            ->get();
          
            $useradd = DB::table('createseva')
            ->leftJoin('user_address', 'user_address.id', '=', 'createseva.useradd_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','Housecleaner')
            ->get();
           
            $usertime = DB::table('createseva')
            ->rightJoin('timelines', 'timelines.id', '=', 'createseva.timeline_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','Housecleaner')
            ->get();
           
            $userclean = DB::table('createseva')
            ->leftJoin('cleanerreq', 'cleanerreq.timeline_id', '=', 'createseva.timeline_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','Housecleaner')
            ->get();
            return view('selpropclean',compact('users','useradd','usertime','userclean'));
        }
        if($roles=='childcare')
        {
            $users = DB::table('createseva')
            ->leftJoin('users', 'users.id', '=', 'createseva.user_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','childcare')
            ->get();
          
            $useradd = DB::table('createseva')
            ->leftJoin('user_address', 'user_address.id', '=', 'createseva.useradd_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','childcare')
            ->get();
           
            $usertime = DB::table('createseva')
            ->rightJoin('timelines', 'timelines.id', '=', 'createseva.timeline_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','childcare')
            ->get();
           
            $usernanny = Nannyreq::query()
            ->get()
            ->groupBy('timeline_id');
            return view('selpropnanny',compact('users','useradd','usertime','usernanny'));
          
        }
        if($roles=='houseCook')
        {
            $users = DB::table('createseva')
            ->leftJoin('users', 'users.id', '=', 'createseva.user_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','houseCook')
            ->get();
          
            $useradd = DB::table('createseva')
            ->leftJoin('user_address', 'user_address.id', '=', 'createseva.useradd_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','houseCook')
            ->get();
           
            $usertime = DB::table('createseva')
            ->rightJoin('timelines', 'timelines.id', '=', 'createseva.timeline_id')
            ->where('createseva.user_id', '=', $uid)
            ->where('createseva.roletype','=','houseCook')
            ->get();
            
            $usercook = Cookreq::query()
            ->get()
            ->groupBy('timeline_id');
            return view('selpropcook',compact('users','useradd','usertime','usercook'));
        }
       
        } 
        public function see_props($tid)
        {
           $uid=auth()->user()->id;
           $props = DB::table('createseva')
           ->rightJoin('proposals', 'proposals.cust_timeid', '=', 'createseva.timeline_id')
           ->where('proposals.cust_timeid','=',$tid)
        
           ->get();
        
           $user = DB::table('users')
           ->join('proposals', 'proposals.user_id', '=', 'users.id')
           ->where('proposals.cust_timeid','=',$tid)
        
           ->get();
           
           $helper = DB::table('helpers')
           ->join('proposals', 'proposals.helper_id', '=', 'helpers.id')
           ->where('proposals.cust_timeid','=',$tid)
        
           ->get();
           
        
           
           return view('propviewuser',compact('props','user','helper')); 
        }
        
    }

