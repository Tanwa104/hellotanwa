<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class SignupController extends Controller
{
    public function create(): View
    {

        return view('auth.signup');
    }
 /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $lname=$request->lastname;
        
        $rid='helper';
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            
            'phone'=>['required'],
            
            
        ]);
$emailid=$request->email;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
          
            'phone'=>$request->phone,
            'userrole'=>$rid,
            'lastname'=>$lname,
            'gender'=>$request->dgen,
            'DOB'=>$request->DOB,
        ]);

        event(new Registered($user));

        $request->session()->put('email', $emailid);
        return redirect('helpadd');
    }
}
