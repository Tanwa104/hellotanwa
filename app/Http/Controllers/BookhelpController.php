<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helper;
use App\Models\Booking;
use App\Models\User;
use App\Models\UserAdd;
use Mail;
use App\Mail\MessageUserMail;
use Illuminate\Support\Facades\DB;
class BookhelpController extends Controller
{
    public function bookhelp()
    {
        
        $uid=auth()->user()->id;

        $helpers=Helper::get();
        foreach($helpers as $help)
        {
            if($help->user_id==$uid)
            {
                $helpid=$help->id;
            }
        }
        $bookuser = DB::table('users')
        ->join('bookings', 'bookings.user_id', '=', 'users.id')
        ->where('bookings.helper_id', '=', $helpid)
        ->get();
        
        $booktime = DB::table('bookings')
        ->join('timelines', 'timelines.id', '=', 'bookings.timeline_id')
        ->where('bookings.helper_id', '=', $helpid)
        ->get();
        if($booktime!=null&&$bookuser!=null)
        {
            return view('clients',compact('bookuser','booktime'));

        }
        
    }
    public function acceptbook($bid)
        {
            $huid=auth()->user()->id;
            $ubid=$bid;
           $books= Booking::get();
           foreach($books as $book)
           {
            if($ubid==$book->id)
            {
                $book->Acceptedpending='accepted';
                $book->save();
                $timeid=$book->timeline_id;
                $uaddid=$book->useradd_id;
                $helpid=$book->helper_id;
                $userid=$book->user_id;
                $itembook=$book;
            
            }
        }   
            DB::table('proposals')->where('cust_timeid', $timeid)->where('helper_id', $helpid)->delete();
            DB::table('createseva')->where('timeline_id', $timeid)->delete();
            $husers=User::get();
            
                foreach($husers as $huser)
                {
                        if($huid==$huser->id)
                        {
                                $itemuse=$huser;
                                foreach($huser->helpers as $help)
                                {
                                    if($huid==$help->user_id)
                                    {
                                        $itemhelp=$help;
                                    }
                                }

                        }
                }
                $adds= UserAdd::get();
                foreach($adds as $add)
                {
                    if($uaddid==$add->id)
                    {
                        $itemaddes=$add;
                    }
                }

            
            $itemsadd=[
                $itembook,
            $itemuse,$itemhelp,$itemaddes];
            
            $items=json_encode($itemsadd); 
            
            $users= User::get();
            foreach($users as $user)
            {
                if($userid==$user->id)
                {
                        $email=$user->email;
                }

                
            }
            Mail::to($email)->send(new MessageUserMail($items));
            return redirect()->back()->with('msg','you have accepted the booking');



           
        }
        public function deniedbook($bid)
        {
            $huid=auth()->user()->id;
            $books=Booking::get();
            foreach($books as $book)
            {
                if($bid==$book->id)
                {
                    $book->Acceptedpending='denied';
                    $book->save();
                    $timeid=$book->timeline_id;
                    $uaddid=$book->useradd_id;
                    $helpid=$book->helper_id;
                    $userid=$book->user_id;
                    $itembook=$book;
                }
            }
            DB::table('proposals')->where('cust_timeid', $timeid)->where('helper_id', $helpid)->delete();

            $husers=User::get();
            
            foreach($husers as $huser)
            {
                    if($huid==$huser->id)
                    {
                            $itemuse=$huser;
                            foreach($huser->helpers as $help)
                            {
                                if($huid==$help->user_id)
                                {
                                    $itemhelp=$help;
                                }
                            }

                    }
            }
            $adds= UserAdd::get();
            foreach($adds as $add)
            {
                if($uaddid==$add->id)
                {
                    $itemaddes=$add;
                }
            }

        
        $itemsadd=[
            $itembook,
        $itemuse,$itemhelp,$itemaddes];
        
        $items=json_encode($itemsadd); 
        
        $users= User::get();
        foreach($users as $user)
        {
            if($userid==$user->id)
            {
                    $email=$user->email;
            }

            
        }
        Mail::to($email)->send(new MessageUserMail($items));

            return redirect()->back()->with('msg1','you have rejected the booking');

        }

    }

