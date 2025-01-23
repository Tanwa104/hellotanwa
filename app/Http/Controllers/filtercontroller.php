<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Timeline;
use App\Models\Helper;
class filtercontroller extends Controller
{
    public function index(Request $request)
    {
       
       
        $roles=$request->role;
        $request->session()->put('role', $roles);
        
        return view('fliter');
    }

    public function store(Request $request)
    {
        
        $bool=false;
        $roles= $request->session()->get('role');
        $secs=Timeline::get();
        $no=Timeline::get()->count();
        $timehel=Helper::get();
        // $users = DB::table('timelines')
        // ->leftJoin('helpers', 'timelines.helpers_id', '=', 'helpers.id')  // Use left join to include all timelines
        // ->get();
    
          
        
        
       $uid=auth()->user()->id; 
        $bhour=$request->input('bhours');
        $bmins=$request->input('bmin');
        $bampm=$request->input('bampm');
        
        $btime=$bhour.$bmins." ".$bampm;
        $carbon = Carbon::create($btime);
       
$ahour=$request->input('ahours');
        $amins=$request->input('amins');
        $aampm=$request->input('aampm');
       
        $atime=$ahour.$amins." ".$aampm;
        $carbon1 = Carbon::create($atime);
        $options=$request->input('options');
    
        



        $items = [];
        foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day) {
            if (in_array($day, $request->get('weekdays'))) {
                $items[] = $day;
            }
        }
    
        // Debug weekdays
          // Check the weekdays array
    
$times=new Timeline();
$times->user_id=$uid;
$times->start_time=$carbon;
$times->end_time=$carbon1;
$times->weekdays=$items;
$times->jobtype=$options;
$times->save();
// $timestore = [];
// sort($items);

//     $timestore = [];
   
//         foreach (Timeline::all() as $time) {
//             foreach ($users as $user) {
                
//             // Ensure time comparison is done using Carbon correctly
//             $startCarbon = Carbon::createFromFormat('H:i:s', $user->start_time);
//             $endCarbon = Carbon::createFromFormat('H:i:s', $user->end_time);
            
//             if ($carbon->eq($startCarbon) && $carbon1->eq($endCarbon)) {
//                 // Decode and sort weekdays
//                 $weekdays = is_string($user->weekdays) ? json_decode($user->weekdays, true) : $user->weekdays;
//                 sort($weekdays);


//                 // Compare weekdays and roles
//                 if ($items === $weekdays && $roles === $user->role) {
//                     if (!in_array($user->helpers_id, $timestore)) {
//                         $timestore[] = $user->helpers_id;
//                         $bool = true;
//                     }
//                 }
//             }
//     }
// }



// // After checking, store the results
// if ($bool == true) {
//     $request->session()->put('yesno', $bool);
//     $request->session()->put('time', $timestore);
// } 
    if($roles =='Housecleaner')
    {
        
        return view('udcleaner');

    }
     if($roles =='childcare')
    {
        
        return view('nanny');

    }
     if($roles =='houseCook')
    {
        
        return view('cook');

    }
    
}


} 
    