<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\models\Nannyreq;
use Illuminate\Support\Facades\DB;
class BidviewController extends Controller
{
    public function bvcleaner(Request $request)
    {
        $uid=auth()->user()->id;
       $users = User::get();
       $city = $request->session()->get('addstr');
       foreach ($users as $user)
       {
        foreach($user->cleanerreq as $clean)
        {
        if($uid==$clean->user_id)
        {
                    $items[]=$user;
           

        }
    
       } 
    }
       return view('bvcleanuser',compact('items','city'));
    }
    public function bvnanny()
    {
     
        //$nanny=Nannyreq::orderBy('id','desc')->usernan->get();
        $posts = Nannyreq::query()
    ->get()
    ->groupBy('user_id');


dd($posts);

}

    public function bvcook()
    {

    }
}
