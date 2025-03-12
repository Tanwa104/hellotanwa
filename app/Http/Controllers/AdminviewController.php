<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Helper;
use App\Models\Booking;

class AdminviewController extends Controller
{
    public function view()
    {
        $users = User::where('userrole', '=', 'user')->get();
        $helpers=Helper::with('user')->get();
        $bookings = Booking::with(['user', 'helper', 'timeline', 'userAddress'])  
   
    ->get();
    

        return view('admin/dash',compact('users','helpers','bookings'));
    }
}
