<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\createseva;
use App\Models\Proposal;
use App\Models\Timeline;
use App\Models\User;
use App\Models\UserAdd;
class bookcontroller extends Controller
{
    public function book($pid)
    {
        
        $uid=auth()->user()->id;
       $books=new Booking();
       $books->user_id=$uid; 
       $props=Proposal::get();
       foreach($props as $prop)
       {
            if($prop->id==$pid)
            {
                $help=$prop->helper_id;
                $time=$prop->cust_timeid;
            }
       }
       $seva=createseva::get();
       foreach($seva as $sev)
       {
        if($sev->timeline_id==$time)
        {
            $add=$sev->useradd_id;
        }
       }
       $books->helper_id=$help;
       $books->timeline_id=$time;
       $books->useradd_id=$add;
       $books->Acceptedpending='pending';
       $books->save();
       return redirect()->route('user.build')
       ->with('message', 'waiting for helper to accept the request,it may take some time');
       
       
    }
    public function viewbook()  
    {  
        $uid = auth()->user()->id;  
        // dd($uid);
        $bookings = Booking::with(['user', 'helper', 'timeline', 'userAddress'])  
    ->where('user_id', $uid) // uid contains the user ID  
    ->get();
            // dd($bookings); 
    
        return view('bookview', compact('bookings'));  
    }  
}
