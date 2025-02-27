<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Helper;
use App\Models\Nannyreq;
use App\Models\Cookreq;
use App\Models\UserAdd;
use App\Models\Booking;
use App\Models\Timelines;
class BidMakeController extends Controller
{
    public function cleanhelper()
    {
        $uid=auth()->user()->id;
        $helpers=Helper::get();
        foreach($helpers as $help)
        {
            if($uid==$help->user_id)
            {
                $helper=$help;
            }
        }
        
        if($helper->role=="Housecleaner")
        {
            
            $users = DB::table('createseva')
            ->leftJoin('users', 'users.id', '=', 'createseva.user_id')
            ->where('createseva.roletype', '=', 'Housecleaner')
            ->get();
          
            $useradd = DB::table('createseva')
            ->leftJoin('user_address', 'user_address.id', '=', 'createseva.useradd_id')
            ->where('createseva.roletype', '=', 'Housecleaner')
            ->get();
           
            $usertime = DB::table('createseva')
            ->leftJoin('timelines', 'timelines.id', '=', 'createseva.timeline_id')
            ->where('createseva.roletype', '=', 'Housecleaner')
            ->get();
           
            $userclean = DB::table('createseva')
            ->leftJoin('cleanerreq', 'cleanerreq.timeline_id', '=', 'createseva.timeline_id')
            ->where('createseva.roletype', '=', 'Housecleaner')
            ->get();
            $data = Useradd::distinct('city')->pluck('city');

          return view('cleanhelpbid',compact('users','useradd','usertime','userclean','data')); 

        }


    
  
        if($helper->role=="childcare")
        {  
            $books=Booking::get();
            foreach($books as $book)
            {
                
                if($book->helper_id==$helper->id)
                {
                    
                    $bhelp=$book;
                    $timeid=$book->timeline_id;
                }
            }
            $times=Timeline::get();
            foreach ($times as $time)
            {
                if($timeid==$time->id)
                {
                        $start=$time->start_time;
                        $end=$time->end_time;
                } 

            }
            
            
            
        $users = DB::table('createseva')
        ->leftJoin('users', 'users.id', '=', 'createseva.user_id')
        ->where('createseva.roletype', '=', 'childcare')
        ->get();
      
        $useradd = DB::table('createseva')
        ->leftJoin('user_address', 'user_address.id', '=', 'createseva.useradd_id')
        ->where('createseva.roletype', '=', 'childcare')
        ->get();
        
        $usertime = DB::table('createseva')
        ->leftJoin('timelines', 'timelines.id', '=', 'createseva.timeline_id')
        ->where('createseva.roletype', '=', 'childcare')
        ->get();
        
        $usernanny = Nannyreq::query()
        ->get()
        ->groupBy('timeline_id');
      
        $data = Useradd::distinct('city')->pluck('city');

        

    
      return view('nannyhelpbid',compact('users','useradd','usertime','usernanny','data')); 
    
}
if($helper->role=="houseCook")
{  
$users = DB::table('createseva')
->leftJoin('users', 'users.id', '=', 'createseva.user_id')
->where('createseva.roletype', '=', 'houseCook')
->get();

$useradd = DB::table('createseva')
->leftJoin('user_address', 'user_address.id', '=', 'createseva.useradd_id')
->where('createseva.roletype', '=', 'houseCook')
->get();

$usertime = DB::table('createseva')
->leftJoin('timelines', 'timelines.id', '=', 'createseva.timeline_id')
->where('createseva.roletype', '=', 'houseCook')
->get();

$usercook = Cookreq::query()
->get()
->groupBy('timeline_id');

$data = Useradd::distinct('city')->pluck('city');

return view('cookhelpbid',compact('users','useradd','usertime','usercook','data')); 


}
}
}
