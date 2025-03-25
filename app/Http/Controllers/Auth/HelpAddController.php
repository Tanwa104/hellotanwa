<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Helper;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
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
    public function lema(Request $request)
    {
        // dd('yeah');
        $helpers=Helper::get();
        $valotp = Session::get('otpsee1');
        $valmail = Session::get('mail1');
        $otpre=$request->input('otp1');
        $users=User::get();
        $user = collect($users)->firstWhere('email', $valmail);

        if (!$user) {
            return view('auth.signup', compact('valmail'));
        }
        
        // Validate OTP
        if ($valotp != $otpre) {
           
            return redirect()->back()->with('error', 'Invalid OTP');
        }
        
        // Find helper related to the user
        $helper = collect($helpers)->firstWhere('user_id', $user->id);
       
        // if (!$helper) {
        //     return redirect()->back()->with('error', 'No helper record found');
        // }
        
        // Check helper status
        switch ($helper->status) {
           
            case 'accepted':
                Auth::login($user);
                return redirect()->route('help.build');
        
            case 'pending':
                return redirect()->back()->with('msg', 'Waiting for admin to welcome you');
        
            case 'rejected':
               // dd('hellomodi');
               return redirect()->back()->with('msg1', 'You have been rejected');
        
            default:
            // dd('hellotrump');
               return redirect()->back()->with('error', 'Invalid helper status');
        }
        
        // If OTP is correct but no other conditions met, show signup view
        return view('auth.signup', compact('valmail'));
    }
        
    public function store(Request $request): RedirectResponse
    {
        $id=0;
        $request->validate([
           
           
                        
                        'exp'=>['required'],
        ]);
        $role=$request->input('roles');
       
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
        $helper->status='pending';
        $helper->exp=$exp;
        $helper->save();

if($helper->status=='accepted')
{
        Auth::login($user);

        return redirect()->route('help.build');
    }
    if($helper->status=='pending')
    {
        return redirect()->back()->with('msg','waiting for admin to welcome you');
    }
    }
}
