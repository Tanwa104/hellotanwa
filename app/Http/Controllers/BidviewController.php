<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\models\Nannyreq;
use App\models\Cookreq;
use App\models\createseva;
use Illuminate\Support\Facades\DB;
class BidviewController extends Controller
{
    public function bvcleaner(Request $request)
    {
        $uid=auth()->user()->id;
        $yeah= $request->session()->get('timesid');
        $yeah1= $request->session()->get('addid');
        $rolew= $request->session()->get('role');
        $us = DB::table('cleanerreq')
         ->leftJoin('timelines', 'cleanerreq.timeline_id', '=', 'timelines.id')  // Use left join to include all timelines
         ->get();
         $yeah= $request->session()->get('timesid');
         $yeah1= $request->session()->get('addid');
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
    $cre=new createseva();
       $cre->user_id=$uid;
       $cre->useradd_id=$yeah1;
       $cre->timeline_id=$yeah;
       $cre->roletype=$rolew;
       $cre->save();
       return view('bvcleanuser',compact('items','city','us'));
    }
    public function bvnanny(Request $request)
    {
        $city = $request->session()->get('addstr');
        $uid=auth()->user()->id;
        $yeah= $request->session()->get('timesid');
        $yeah1= $request->session()->get('addid');
        $rolew= $request->session()->get('role');

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
$cre=new createseva();
       $cre->user_id=$uid;
       $cre->useradd_id=$yeah1;
       $cre->timeline_id=$yeah;
       $cre->roletype=$rolew;
       $cre->save();
 return view('bvnannyuser',compact('items','city','us','no','itemadd'));
    

    



}

    public function bvcook(Request $request)
    {
        $city = $request->session()->get('addstr');
        $uid=auth()->user()->id;
        $yeah= $request->session()->get('timesid');
        $yeah1= $request->session()->get('addid');
        $rolew= $request->session()->get('role');

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
$cre=new createseva();
       $cre->user_id=$uid;
       $cre->useradd_id=$yeah1;
       $cre->timeline_id=$yeah;
       $cre->roletype=$rolew;
       $cre->save();
 return view('bvcookuser',compact('items','city','us','no','itemadd'));
    

    }
}
