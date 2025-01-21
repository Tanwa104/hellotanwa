<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\User;
use App\Models\Helper;
use App\Models\UserAdd;
use App\Models\Timeline ;



class CleanerController extends Controller
{
    public function cleaner(Request $request)
    {
        // $data = Helper::first()->user();
        // $data = User::where('id',43)->with('helpers')->first();
       // $data = Helper::where('id',10)->first();
        //$users= = User::where('id',$d)

        $timearr[]= $request->session()->get('time');
        $request->session()->forget('time');
       
    $yeah= $request->session()->get('yesno');
        $city=null;
        $flag=0;
        $users=User::get();
        $helpers=Helper::get();
        $userAdd=UserAdd::get();
        $role=auth()->user()->role_id;
        $city = $request->session()->get('city');
        dd($city);
        $request->session()->forget('city');
       // $currcity=$curruser->city;
       if($city==null) {
        
        
        // clear all session
    
        // redirect user to login page and send session message
        return redirect()->back()->with('msg' ,'add the address');
           }
           $usarea = $request->session()->get('area');
               
           $items = [];
           $flag = false; // Set flag to false initially
           
           // Loop through each user
           foreach ($users as $user) {
               // Check if role doesn't match and $yeah is true
               if ($role != $user->role_id && $yeah == true) {
           
                   // Loop through each helper for this user
                   foreach ($user->helpers as $help) {
                       $n = count($timearr[0]);
           
                       // Loop through the timearr values to check if help's role matches 'houseCook' and id matches
                       for ($i = 0; $i < $n; $i++) {
                           if ($help->role == 'Housecleaner' && $help->id == $timearr[0][$i]) {
           
                               // Loop through each address of the user
                               foreach ($user->address as $add) {
           
                                   // Check if city matches
                                   if ($city == $add->city) {
           
                                       // Initialize areas array to avoid issues with previous iterations
                                       $are = [];
           
                                       // Loop through areas and populate the $are array
                                       foreach ($user->areas as $area) {
                                           $are[] = $area->areas;
                                           
                                       }
           
                                       // Check if address_line_2 matches any of the areas
                                       foreach ($are[0] as $area) {
                                           if ($usarea == $area) {
                                               // Add user to $items if they match
                                               $items[] = $user;
                                               $flag = true;  // Indicate a match has been found
                                               break 4; // Break out of all four loops once a match is found
                                           }
                                       }
                                   }
                               }
                           }
                       }
                   }
               }
           }
           
           // After processing all users, if no matches were found, redirect with a message
           if (!$flag) {
               return redirect()->back()->with('msg', 'Sorry, no one is available');
           }
           
           // If matches were found, return the view with the matching items
           return response()->view('cleaner', compact('items'));
           
           
    
    }
    public function nanny(Request $request)

    {
        $data = Timeline::where('id',9)->with('helper')->first();
        // dd($data);
        $flag=0;
        $timearr[]= $request->session()->get('time');
        
         
        $yeah= $request->session()->get('yesno');
        $city=null;
        $flag=0;
        $users=User::get();
        $helpers=Helper::get();
        $userAdd=UserAdd::get();
        $role=auth()->user()->role_id;
        $city = $request->session()->get('city');
       // $currcity=$curruser->city;
       if($city==null) {
        
        
        // clear all session
    
        // redirect user to login page and send session message
        return redirect()->back()->with('msg' ,'add the address');
           }
          
           $usarea = $request->session()->get('area');
        
           $items = [];
           $flag = false; // Set flag to false initially
           
           // Loop through each user
           foreach ($users as $user) {
               // Check if role doesn't match and $yeah is true
               if ($role != $user->role_id && $yeah == true) {
           
                   // Loop through each helper for this user
                   foreach ($user->helpers as $help) {
                       $n = count($timearr[0]);
           
                       // Loop through the timearr values to check if help's role matches 'houseCook' and id matches
                       for ($i = 0; $i < $n; $i++) {
                           if ($help->role == 'childcare' && $help->id == $timearr[0][$i]) {
           
                               // Loop through each address of the user
                               foreach ($user->address as $add) {
           
                                   // Check if city matches
                                   if ($city == $add->city) {
           
                                       // Initialize areas array to avoid issues with previous iterations
                                       $are = [];
           
                                       // Loop through areas and populate the $are array
                                       foreach ($user->areas as $area) {
                                           $are[] = $area->areas;
                                           
                                       }
           
                                       // Check if address_line_2 matches any of the areas
                                       foreach ($are[0] as $area) {
                                           if ($usarea == $area) {
                                               // Add user to $items if they match
                                               $items[] = $user;
                                               $flag = true;  // Indicate a match has been found
                                               break 4; // Break out of all four loops once a match is found
                                           }
                                       }
                                   }
                               }
                           }
                       }
                   }
               }
           }
           
           // After processing all users, if no matches were found, redirect with a message
           if (!$flag) {
               return redirect()->back()->with('msg', 'Sorry, no one is available');
           }
           
           // If matches were found, return the view with the matching items
           return response()->view('cleaner', compact('items'));
           
           
    }
    public function cook(Request $request)
    {
        $timearr[]= $request->session()->get('time');
        
        $yeah= $request->session()->get('yesno');
        $city=null;
        $flag=0;
        $users=User::get();
        $helpers=Helper::get();
        $userAdd=UserAdd::get();
        $role=auth()->user()->role_id;
        $city = $request->session()->get('city');
        
       // $currcity=$curruser->city;
       if($city==null) {
        
        
        // clear all session
    
        // redirect user to login page and send session message
        return redirect()->back()->with('msg' ,'add the address');
           }
           $usarea = $request->session()->get('area');
        
       
       // Initialize items and flag outside the loop
$items = [];
$flag = false; // Set flag to false initially

// Loop through each user
foreach ($users as $user) {
    // Check if role doesn't match and $yeah is true
    if ($role != $user->role_id && $yeah == true) {

        // Loop through each helper for this user
        foreach ($user->helpers as $help) {
            $n = count($timearr[0]);

            // Loop through the timearr values to check if help's role matches 'houseCook' and id matches
            for ($i = 0; $i < $n; $i++) {
                if ($help->role == 'houseCook' && $help->id == $timearr[0][$i]) {

                    // Loop through each address of the user
                    foreach ($user->address as $add) {

                        // Check if city matches
                        if ($city == $add->city) {

                            // Initialize areas array to avoid issues with previous iterations
                            $are = [];

                            // Loop through areas and populate the $are array
                            foreach ($user->areas as $area) {
                                $are[] = $area->areas;
                                
                            }

                            // Check if address_line_2 matches any of the areas
                            foreach ($are[0] as $area) {
                                if ($usarea == $area) {
                                    // Add user to $items if they match
                                    $items[] = $user;
                                    $flag = true;  // Indicate a match has been found
                                    break 4; // Break out of all four loops once a match is found
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

// After processing all users, if no matches were found, redirect with a message
if (!$flag) {
    return redirect()->back()->with('msg', 'Sorry, no one is available');
}

// If matches were found, return the view with the matching items
return response()->view('cleaner', compact('items'));



}
}