<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Helper;
use App\Models\Nannyreq;
use App\Models\Cookreq;
use App\Models\UserAdd;
use App\Models\Booking;
use App\Models\Timeline;
use Illuminate\Support\Carbon;
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

        $books=Booking::get();
            foreach($books as $book)
            {
                
                if($book->helper_id==$helper->id)
                {
                    
                    $bhelp=$book;
                    $timeid=$book->timeline_id;
                }
            }
            // dd($timeid);
        //     foreach ($usertime as $utime)
        //     {
        //         $ustart=$utime->start_time;
        //         $uend=$utime->end_time;
        //     $conflict = false;
            $times=Timeline::get();
            $newProposals = [];
            // $helperBookings = Booking::
            foreach ($times as $time)
            {
                if($time->id==$timeid)
                $btime[]=$time;
            }
            // dd($btime);
            //dd($usertime);

            // foreach($btime as $helperBooking){
            //     $helperStart =Carbon::parse($helperBooking->start_time);
            //     $helperEnd = Carbon::parse($helperBooking->end_time);
            //     $helperweek=$helperBooking->weekdays;

            //     foreach($usertime as $utime){
            //         $ustart = Carbon::parse($utime->start_time);
            //         $uend = Carbon::parse($utime->end_time);
            //         $uweek=$utime->weekdays;
            //         $hasMatch = collect($helperweek)->intersect($uweek);
            //         if ((!$ustart->lessThan($helperEnd) && $uend->greaterThan($helperStart))||$hasMatch->isNotEmpty()){
            //             $newProposals[] = $utime;
            //         }
            //         // $string1=$utime->weekdays;
            //         // $uweek=explode(',', $string1);
            //     }

            // }
            // dd($newProposals);
            
            // $week=$btime[$k]->weekdays;

            
            
                //         if($timeid==$time->id)
                //         {
                //             $bookingStartTime = Carbon::parse($time->start_time);
                //             $bookingEndTime = Carbon::parse($time->end_time);
                        
                

                        
        //             }  
                    
        //         } 

        //     }
        // }

    
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
