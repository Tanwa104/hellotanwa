<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Timeline;
use App\Models\User;
use App\Models\Area;

class NewClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('newclients');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
$sec=new Timeline();

       $uid=auth()->user()->id; 
       
       $users=User::get();
       foreach($users as $user)
       {
            foreach($user->helpers as $help)
            {
                if($help->user_id==$uid)
                {
                    $heid=$help->id;
                }
            }
       }
        $bhour=$request->input('bhours');
        $bmins=$request->input('bmin');
        $bampm=$request->input('bampm');
        
        $btime=$bhour.$bmins." ".$bampm;
        $carbon = new Carbon($btime);

$sec->start_time=$carbon;
$ahour=$request->input('ahours');
        $amins=$request->input('amins');
        $aampm=$request->input('aampm');
        
        $atime=$ahour.$amins." ".$aampm;
        $carbon1 = new Carbon($atime);
        $sec->end_time=$carbon1;
        $sec->user_id=$uid;
        $sec->helpers_id=$heid;
        



        if(in_array('monday', $request->get('weekdays'))){
        
       $items[]='monday';
        }
        if(in_array('tuesday', $request->get('weekdays'))){
        
            $items[]='tuesday';
    }
    if(in_array('wednesday', $request->get('weekdays'))){
        
        $items[]='wednesday';
}
    if(in_array('thusday', $request->get('weekdays'))){
        
        $items[]='thursday';
    }
    if(in_array('friday', $request->get('weekdays'))){
        $items[]='friday';
}
if(in_array('saturday', $request->get('weekdays'))){
        
    $items[]='saturday';

}
if(in_array('sunday', $request->get('weekdays'))){
        
   $items[]='sunday';
}
$sec->weekdays=$items;
$sec->jobtype='fulltime';
$sec->save();
return view('multiadd');
}

  public function addarea(Request $request)
  {
    $uid=auth()->user()->id;
    $areas=new Area();
    $ui=$request->input('textbox-count');
    
    $cities = $request->input('city');
$areas->user_id=$uid;
    $areas->areas=$cities;
    $areas->save();
    $message = 'Your action was successful!';
    session()->flash('success', $message);
    
    return view('newclients');
  }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
