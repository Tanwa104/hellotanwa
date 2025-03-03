<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\models\Helper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\UserAdd;
class HelpeditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id=auth()->user()->id;
        $users=User::get();
        foreach($users as $user)
        {
            foreach($user->helpers as $help)
            {
            if($id==$help->user_id)
            {
                $items[]=$user;
            }
        }
        foreach($user->address as $add)
        {
            if($id==$add->user_id)
            {
                $itemadd[]=$user;
            }
        }
    }
    // dd($items[0]->helpers[0]->role);
    return response()->view('helperedit',compact('items'));
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
        
    }


public function changes(Request $request, string $id)
{
    $helper=Helper::find($id);
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
   $role=$request->roles;
   $gender=$request->gender;
    $phone=$request->phone;
    $DOB=$request->DoB;
    if($pass==$con)
    {
    $user->name=$name;
    $user->lastname=$lname;
    $user->email=$ename;
    $user->password=Hash::make($pass);
    $user->phone=$phone;
    $user->role_id=2;
    $helper->role=$role;
    $user->gender=$gender;
        $user->DOB=$DOB;
    $user->save();
    $helper->save();
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
        ->view('helpaddeit',compact('pid','data')); 
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
        return redirect()->route('edhelp.index');
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
