<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Booking;
use App\Models\User;
use App\Models\UserAdd;
use App\Models\Helper;
class HelpRateViewController extends Controller
{
    public function view_rate()
    {
        $uid=auth()->user()->id;
        $husers =User::get();
        foreach($husers as $huser)
        {
            foreach($huser->helpers as $help)
            {
                if($uid==$help->user_id)
                {
                    $helpid=$help->id;
                }

            }
        }
        $books=Booking::get();
        foreach($books as $book)
        {
            if($helpid==$book->helper_id)
            {
                $heid[]=$book->id;
                $userid[]=$book->user_id;
                $addid[]=$book->useradd_id;
            }

        }
        $n=count($heid);
        $rates=Rating::get();
        foreach($rates as $rate)
        {
            for($i=0;$i<$n;$i++)
            {
                if($heid[$i]==$rate->booking_id)
                {
                    $items[]=$rate;
                }
            }
        }
        $n1=count($userid);
        $users=User::get();
        foreach($users as $user)
        {
            for($i=0;$i<$n1;$i++)
            {
                if($userid[$i]==$user->id)
                {
                    $itemuser[]=$user;
                }
            }
        }
        $n2=count($addid);
        $adds=UserAdd::get();
        foreach($adds as $add)
        {
            for($i=0;$i<$n2;$i++)
            {
                if($addid[$i]==$add->id)
                {
                    $itemadd[]=$add;
                }
            }
        }

        return view('viewratings',compact('items','itemuser','itemadd'));

    }

}
