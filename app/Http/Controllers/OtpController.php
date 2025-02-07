<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\OtpMail;

class OtpController extends Controller
{

    public function genotp(Request $request)
    {
        $otp = rand(1000, 9999);
     Session::put('otpsee',$otp);
        Request::json('data');
       $id= Request::get('email'); 
       Session::put('mail',$id);
       
    
        Mail::to($id)->send(new OtpMail($otp));
        return response()->json(['message' => 'OTP sent successfully,please wait for few minutes and check email and spam/junk email folder']);
    }
    public function genotphelp(Request $request)
    {
        $otp = rand(1000, 9999);
     Session::put('otpsee1',$otp);
        Request::json('data');
       $id= Request::get('email'); 
       Session::put('mail1',$id);
       
    
        Mail::to($id)->send(new OtpMail($otp));
        return response()->json(['message' => 'OTP sent successfully,please wait for few minutes and check email and spam/junk email folder']);
    }
    }

