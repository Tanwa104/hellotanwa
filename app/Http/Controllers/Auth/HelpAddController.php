<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Helper;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class HelpAddController extends Controller
{
    public function create(): View
    {
        return view('auth.helpadd');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $id=0;
        $request->validate([
           
           
                        'city'=>['required'],
                        'exp'=>['required'],
        ]);
        $role=$request->input('roles');
        $city=$request->input('city');
        $exp=$request->input('exp');
        $value = $request->session()->get('email');
        
        $users=User::get();
        foreach($users as $user)
        {
            if($user->email==$value)
            {
                $id=$user->id;
            }
        }

        $helper = new Helper();
        $helper->user_id=$id;
        $helper->role=$role;
        $helper->city=$city;
        $helper->exp=$exp;
        $helper->save();

        Auth::login($user);

        return redirect()->route('help.build');
    }
}
