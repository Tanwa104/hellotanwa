<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proposal;
class ProposalController extends Controller
{
    public function index()
    {
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
        
        
        return view('makeprop',compact('items'));
    }
    public function store(Request $request)
    {
        $uid=auth()->user()->id;
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
        $prop->user_id=$uid;
        $prop->helper_id=$helpid;
        $prop->useradd_id=$addid;
        $prop->price=$pprice;
        $prop->save();
        return redirect()->back()->with('msg',"proposal is registered");
    }
}
