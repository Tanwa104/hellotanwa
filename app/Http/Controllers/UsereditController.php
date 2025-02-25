<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAdd;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class UsereditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uid=auth()->user()->id;
        $useradd=User::get();
        foreach($useradd as $add)
        {
            if($uid==$add->id)
            {
               $items[]=$add;
               $itemadd[]=$add->address;
            }
        }
        
        return view('useredit',compact('items','itemadd'));
        
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            
            'phone'=>['required'],
            
        ]);
        $id=auth()->user()->id;
        $user=User::find($id);
        $name=$request->name;
        
        $lname=$request->lastname;
        
        $ename=$request->email;
        
        $pass=$request->password;
        
        $con=$request->password_confirmation;
       
        $phone=$request->phone;
        if($pass==$con)
        {
        $user->name=$name;
        $user->lastname=$lname;
        $user->email=$ename;
        $user->password=Hash::make($pass);
        $user->phone=$phone;
        $user->role_id=1;
        $user->save();
        return redirect()->back()->with('msg','success');
        }
        else
        {
            return redirect()->back()->with('msg','password doesnot match');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=UserAdd::find($id);
        $pid=$data->id;
        return response()
        ->view('useraddedit',compact('pid','data')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $uid=UserAdd::find($id);
        $uid->user_id=auth()->user()->id;
        $add1=$request->input('address1');
       
        $uid->address_line_1=$add1;
        $add2=$request->input('address2');
        $uid->address_line_2=$add2;
        $area=$request->input('area');
        $uid->area=$area;
        $city=$request->input('city');
        $uid->city=$city;
        $state=$request->input('state');
        $uid->state=$state;
        $country=$request->input('country');
        $uid->country=$country;
        $zip=$request->input('zip');
        $uid->pincode=$zip;

        $uid->save();
        return redirect()->route('edus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=UserAdd::find($id);
        
       
        $post->delete();
        return redirect()->back();

    }
}
