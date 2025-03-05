<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Timeline;
use App\Models\User;
use App\Models\Area;
use App\Models\createseva;
class NewClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('multiadd');
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

  public function addareaclean(Request $request)
  {
    $cityName = $request->input('city');
    // dd($request->all());
    $crea=createseva::with('address')->first();
    // dd($crea);
    // $createSeva = createseva::where('roletype','childcare')->has('address')
    // ->with(['address' => function($q) use($request){
    //     $q ->where('city', 'LIKE', '%' . $request->city1 . '%');
    //     foreach($request->city as $item){
    //         $q ->where('area', 'LIKE', '%' . $item . '%');
    //     }
    // }])->get();
    $createSeva = CreateSeva::where('roletype', 'Housecleaner')
    ->whereHas('address', function ($q) use ($request) {
        $q->where('city', 'LIKE', '%' . $request->city1 . '%');

        if (!empty($request->city) && is_array($request->city)) {
            $q->where(function ($query) use ($request) {
                foreach ($request->city as $item) {
                    $query->orWhere('area', 'LIKE', '%' . $item . '%');
                }
            });
        }
    })
    ->with(['address' => function ($q) use ($request) {
        $q->where('city', 'LIKE', '%' . $request->city1 . '%');

        if (!empty($request->city) && is_array($request->city)) {
            $q->where(function ($query) use ($request) {
                foreach ($request->city as $item) {
                    $query->orWhere('area', 'LIKE', '%' . $item . '%');
                }
            });
        }
    }])
    ->get();
    $createSeva1 = CreateSeva::where('roletype', 'Housecleaner')
    ->whereHas('address', function ($q) use ($cityName) {
        $q->whereRaw("BINARY city = ?", [$cityName]); // Ensures case-sensitive match
    })
    ->with('address') // Load the relation without filtering again
    ->get();

    


    

    // createSeva::with(['products' => function ($q) use($wholesalers_id,$r){
    //     $q->when($r->keyword, function ($query) use($r){
    //         $query->where('name', 'LIKE', '%' . $r->keyword . '%');
    //     });


    return redirect()->back()->with(['data' => $createSeva1]);
    
    
    
  }
  public function addarea(Request $request)
  {
    $cityName = $request->input('city');
    
    // dd($request->all());
    $crea=createseva::with('address')->first();
    // dd($crea);
    // $createSeva = createseva::where('roletype','childcare')->has('address')
    // ->with(['address' => function($q) use($request){
    //     $q ->where('city', 'LIKE', '%' . $request->city1 . '%');
    //     foreach($request->city as $item){
    //         $q ->where('area', 'LIKE', '%' . $item . '%');
    //     }
    // }])->get();
    $createSeva = CreateSeva::where('roletype', 'childcare')
    ->whereHas('address', function ($q) use ($request) {
        $q->where('city', 'LIKE', '%' . $request->city1 . '%');

        if (!empty($request->city) && is_array($request->city)) {
            $q->where(function ($query) use ($request) {
                foreach ($request->city as $item) {
                    $query->orWhere('area', 'LIKE', '%' . $item . '%');
                }
            });
        }
    })
    ->with(['address' => function ($q) use ($request) {
        $q->where('city', 'LIKE', '%' . $request->city1 . '%');

        if (!empty($request->city) && is_array($request->city)) {
            $q->where(function ($query) use ($request) {
                foreach ($request->city as $item) {
                    $query->orWhere('area', 'LIKE', '%' . $item . '%');
                }
            });
        }
    }])
    ->get();
    $createSeva1 = CreateSeva::where('roletype', 'childcare')
    ->whereHas('address', function ($q) use ($cityName) {
        $q->whereRaw("BINARY city = ?", [$cityName]); // Ensures case-sensitive match
    })
    ->with('address') // Load the relation without filtering again
    ->get();

    

    // createSeva::with(['products' => function ($q) use($wholesalers_id,$r){
    //     $q->when($r->keyword, function ($query) use($r){
    //         $query->where('name', 'LIKE', '%' . $r->keyword . '%');
    //     });


    return redirect()->back()->with(['data' => $createSeva1]);
    
    
    
  }

  public function addareacook(Request $request)
  {
    $cityName = $request->input('city');
    // dd($request->all());
    $crea=createseva::with('address')->first();
    // dd($crea);
    // $createSeva = createseva::where('roletype','childcare')->has('address')
    // ->with(['address' => function($q) use($request){
    //     $q ->where('city', 'LIKE', '%' . $request->city1 . '%');
    //     foreach($request->city as $item){
    //         $q ->where('area', 'LIKE', '%' . $item . '%');
    //     }
    // }])->get();
    $createSeva = CreateSeva::where('roletype', 'houseCook')
    ->whereHas('address', function ($q) use ($request) {
        $q->where('city', 'LIKE', '%' . $request->city1 . '%');

        if (!empty($request->city) && is_array($request->city)) {
            $q->where(function ($query) use ($request) {
                foreach ($request->city as $item) {
                    $query->orWhere('area', 'LIKE', '%' . $item . '%');
                }
            });
        }
    })
    ->with(['address' => function ($q) use ($request) {
        $q->where('city', 'LIKE', '%' . $request->city1 . '%');

        if (!empty($request->city) && is_array($request->city)) {
            $q->where(function ($query) use ($request) {
                foreach ($request->city as $item) {
                    $query->orWhere('area', 'LIKE', '%' . $item . '%');
                }
            });
        }
    }])
    ->get();
    $createSeva1 = CreateSeva::where('roletype', 'houseCook')
    ->whereHas('address', function ($q) use ($cityName) {
        $q->whereRaw("BINARY city = ?", [$cityName]); // Ensures case-sensitive match
    })
    ->with('address') // Load the relation without filtering again
    ->get();
    


    

    // createSeva::with(['products' => function ($q) use($wholesalers_id,$r){
    //     $q->when($r->keyword, function ($query) use($r){
    //         $query->where('name', 'LIKE', '%' . $r->keyword . '%');
    //     });


    return redirect()->back()->with(['data' => $createSeva1]);
    
    
    
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
