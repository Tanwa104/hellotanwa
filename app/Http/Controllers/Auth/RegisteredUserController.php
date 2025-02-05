<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $valotp = Session::get('otpsee');
        $valmail = Session::get('mail');
        
        $otpreq=$request->input('otp');
        $rid=1;
        $lname=$request->lastname;
        
     $users=User::get();
     foreach($users as $user)
     {
        if($valotp==$otpreq)
        {
        if($valmail==$user->email)
        {
            Auth::login($user);

            return redirect()->route('user.build');
        }
     }
    }
if($valotp==$otpreq)
{
        $user = User::create([
           
            'email' => $valmail,
            'role_id'=> $rid,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.build');
    }
}
}
