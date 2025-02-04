<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Mail\OtpMail;

class OtpController extends Controller
{

    public function genotp(Request $request)
    {
        $otp = rand(1000, 9999);
        $request->session()->put('otpse', $otp);
        Request::json('data');
       $id= Request::get('email'); 

       
    
        Mail::to($id)->send(new OtpMail($otp));
        
    }
    }

