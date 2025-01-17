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
        
        $request->session()->forget('city');
       // $currcity=$curruser->city;
       if($city==null) {
        
        
        // clear all session
    
        // redirect user to login page and send session message
        return redirect()->back()->with('msg' ,'add the address');
           }
                       
        foreach($users as $user)
        {
    
            if($role!=$user->role_id&&$yeah==true)
            {
 
              
            foreach($user->helpers as $help)
               {
                
    
                $n=count($timearr[0]);
for($i=0;$i<$n;$i++){
if($help->role=='Housecleaner'&&$help->id==$timearr[0][$i])
                {
                    
            foreach($user->address as $add)
            {
                
                
                if($city==$add->city)
                {
                    
                    $items[] = $user;
                    $flag=1;

                }
                
              }

            }
}
               }

                 }  }
    

    if($flag==0)
    {
        return redirect()->back()->with('msg','sorry noone available');
    }
        
        return  response()->view('cleaner',compact('items'));

    
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
          
       
        foreach($users as $user)
        {
            if($role!=$user->role_id&&$yeah==true)
            {
            foreach($user->helpers as $help)
               {
                $n=count($timearr[0]);
                for($i=0;$i<$n;$i++){  
                if($help->role=='childcare'&&$help->id==$timearr[0][$i])
                {
            foreach($user->address as $add)
            {

                if($city==$add->city)
                {
                    $items[] = $user;
                    $flag=1;
                }
              }  }
                 } } }
    }

    if($flag==0)
    {
        return redirect()->back()->with('msg','sorry noone available');
    }
        
        return  response()->view('cleaner',compact('items'));

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
          
       
        foreach($users as $user)
        {
            if($role!=$user->role_id&&$yeah==true)
            {
            foreach($user->helpers as $help)
               {
                $n=count($timearr[0]);
for($i=0;$i<$n;$i++){
                if($help->role=='houseCook'&&$help->id==$timearr[0][$i])
                {
            foreach($user->address as $add)
            {

                if($city==$add->city)
                {
                    $items[] = $user;
                    $flag=1;
                }
              }  }
                 } } }
    }

    if($flag==0)
    {
        return redirect()->back()->with('msg','sorry noone available');
    }
        
        return  response()->view('cleaner',compact('items'));

    }


}
