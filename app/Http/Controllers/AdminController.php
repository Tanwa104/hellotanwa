<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/addlog');
    }
    public function create(Request $request)
    {
        $email=$request->input('email');
        $pass=$request->input('pass');
        $users=User::where('userrole','=','admin')->get();
        foreach($users as $user)
        {
            if($email==$user->email&&$pass==$user->password)
            {
                return redirect()->intended(route('admin.dashboard'));
            }
        }

    }
    
}
