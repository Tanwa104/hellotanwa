<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;
class ProposalController extends Controller
{
    public function index(Request $request,$id,$tid)
    {
        $cid=$id;
        $ctid=$tid;
        $request->session()->put('custid', $cid);
        $request->session()->put('custtimeid', $ctid);
        $uid=auth()->user()->id;
        
        $users=User::get();
        foreach($users as $user)
        {
            foreach($users as $user)
            {
                if($uid==$user->id)
                {
                    $items=$user;
                }
            }
        }
        
        
        return view('makeprop',compact('items','cid'));
    }
   

    public function makestore(Request $request)
    {
        $uid=auth()->user()->id;
        $yeah= $request->session()->get('custid');
        $ytime= $request->session()->get('custtimeid');
        
        $pprice=$request->input('price');
        $users=User::get();
        foreach($users as $user)
        {
            foreach($users as $user)
            {
                if($uid==$user->id)
                {
                   foreach($user->helpers as $help)
                   {
                    $helpid=$help->id;
                   }
                   foreach($user->address as $add)
                   {
                    $addid=$add->id;
                   }
                }
            }
        }
       
        $prop=new Proposal();
        $prop->cust_userid=$yeah;
        $prop->cust_timeid=$ytime;
        $prop->user_id=$uid;
        $prop->helper_id=$helpid;
        $prop->useradd_id=$addid;
        $prop->price=$pprice;
        $prop->save();
        return redirect()->back()->with('msg',"proposal is registered");
    }
}
