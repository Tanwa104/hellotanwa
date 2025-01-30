<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Nannyreq;
use App\Models\Cookreq;
use Illuminate\Http\Request;

class PropUserController extends Controller
{
    public function propuser()
    {
        $uid=auth()->user()->id;
      
        

            $users = DB::table('createseva')
            ->leftJoin('users', 'users.id', '=', 'createseva.user_id')
            ->where('createseva.user_id', '=', $uid)
            ->get();
          
            $useradd = DB::table('createseva')
            ->leftJoin('user_address', 'user_address.id', '=', 'createseva.useradd_id')
            ->where('createseva.user_id', '=', $uid)
            ->get();
           
            $usertime = DB::table('createseva')
            ->leftJoin('timelines', 'timelines.id', '=', 'createseva.timeline_id')
            ->where('createseva.user_id', '=', $uid)
            ->get();
           
            $userclean = DB::table('createseva')
            ->leftJoin('cleanerreq', 'cleanerreq.timeline_id', '=', 'createseva.timeline_id')
            ->where('createseva.user_id', '=', $uid)
            ->get();
            $usernan = DB::table('createseva')
            ->leftJoin('nannyreq', 'nannyreq.timeline_id', '=', 'createseva.timeline_id')
            ->where('createseva.user_id', '=', $uid)
            ->get();
            $userchef = DB::table('createseva')
            ->leftJoin('cookreq', 'cookreq.timeline_id', '=', 'createseva.timeline_id')
            ->where('createseva.user_id', '=', $uid)
            ->get();
            // dump($usernan);
            // dump($userchef);
            // dd('he');
            $usernanny = Nannyreq::query()
            ->get()
            ->groupBy('timeline_id');
        
            $usercook = Cookreq::query()
                ->get()
                ->groupBy('timeline_id');
                dump($usertime);
dd($usernanny);

          return view('propcussel',compact('users','useradd','usertime','userclean','usernanny','usercook','usernan','userchef')); 

        
    
}
    public function propuserview(Request $request)
    {
       
        } 
    }

