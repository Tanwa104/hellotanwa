<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helper;
use Illuminate\Support\Facades\DB;
class BookhelpController extends Controller
{
    public function bookhelp()
    {
        
        $uid=auth()->user()->id;

        $helpers=Helper::get();
        foreach($helpers as $help)
        {
            if($helpers->user_id=$uid)
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
            
        }
        public function deniedbook($bid)
        {
            
        }

    }

