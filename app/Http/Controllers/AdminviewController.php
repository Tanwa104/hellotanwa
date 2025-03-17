<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Helper;
use App\Models\Booking;
use App\Models\UserAdd;

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

    public function seereports()
    {
        $useradd = UserAdd::has('bookings') // Fetch only addresses that have bookings
    ->with('bookings') 
     // Load the related bookings
    ->get()
    ->groupBy('city');
        // $books=$useradd->bookings->get()->groupBy('city')
        return view('admin/reports',compact('useradd'));

    }

}
