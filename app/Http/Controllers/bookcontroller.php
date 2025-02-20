<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $uid=auth()->user()->id;
       
            $users=User::get();
            $books=Booking::get();
            foreach($books as $book)
            {
                if($uid==$book->user_id)
                {
                
                    $helpid[]=$book->helper_id;
                    $timeid[]=$book->timeline_id;
                    $addid[]=$book->useradd_id;
                    $ibook[]=$book;
                
                }
            }
            $n=count($helpid);
            foreach($users as $user)
            {
                foreach($user->helpers as $help)
                {
                    
                    for($i=0;$i<$n;$i++)
                    {
                        
                        if($helpid[$i]==$help->id)
                        {
                            $role[]=$help->role;
                            $items[]=$user;

                        }
                    }
                    $n1=count($timeid);
                    $times=Timeline::get();
                    foreach($times as $time)
                    {
                    for($j=0;$j<$n1;$j++)
                    {
                        if($timeid[$j]==$time->id)
                        {
                            $itime[]=$time;
                        }
                    }
                    
                }
                $n2=count($addid);
                $adds=UserAdd::get();
                foreach($adds as $add)
                {
                for($k=0;$k<$n2;$k++)
                {
                    if($addid[$k]==$add->id)
                    {
                        $iadd[]=$add;
                    }
                }
                
            }
                    
                }
            }
           

return view('bookview',compact('role','items','itime','iadd','ibook'));

            
            
      

   }
}
