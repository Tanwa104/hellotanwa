<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\models\Nannyreq;
use App\models\Cookreq;
use Illuminate\Support\Facades\DB;
class BidviewController extends Controller
{
    public function bvcleaner(Request $request)
    {
        $uid=auth()->user()->id;
        $us = DB::table('cleanerreq')
         ->leftJoin('timelines', 'cleanerreq.timeline_id', '=', 'timelines.id')  // Use left join to include all timelines
         ->get();
        
       $users = User::get();
       $city = $request->session()->get('addstr');
       foreach ($users as $user)
       {
        foreach($user->cleanerreq as $clean)
        {
        if($uid==$clean->user_id)
        {
                    $items[]=$user;
           

        }
    
       } 
    }
       return view('bvcleanuser',compact('items','city','us'));
    }
    public function bvnanny(Request $request)
    {
        $city = $request->session()->get('addstr');
        $uid=auth()->user()->id;
 $us = DB::table('nannyreq')
         ->leftJoin('timelines', 'nannyreq.timeline_id', '=', 'timelines.id')  // Use left join to include all timelines
         ->get();
        
        $users=User::get();
        foreach($users as $user)
        {
            if($uid==$user->id)
            {
                $itemadd=$user;
            }
        }

        //$nanny=Nannyreq::orderBy('id','desc')->usernan->get();
        $posts = Nannyreq::query()
    ->get()
    ->groupBy('user_id');
    $items=$posts[$uid];
$no=count($items);
 return view('bvnannyuser',compact('items','city','us','no','itemadd'));
    

    



}

    public function bvcook(Request $request)
    {
        $city = $request->session()->get('addstr');
        $uid=auth()->user()->id;
 $us = DB::table('cookreq')
         ->leftJoin('timelines', 'cookreq.timeline_id', '=', 'timelines.id')  // Use left join to include all timelines
         ->get();
        
        $users=User::get();
        foreach($users as $user)
        {
            if($uid==$user->id)
            {
                $itemadd=$user;
            }
        }

        //$nanny=Nannyreq::orderBy('id','desc')->usernan->get();
        $posts = Cookreq::query()
    ->get()
    ->groupBy('user_id');
    $items=$posts[$uid];
$no=count($items);
 return view('bvcookuser',compact('items','city','us','no','itemadd'));
    

    }
}
