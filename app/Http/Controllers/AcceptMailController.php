<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
class AcceptMailController extends Controller
{
    public function accepttest(){
    
        $mailData = [

            'title' => 'Mail from ItSolutionStuff.com',

            'body' => 'This is for testing email using smtp.'

        ];

         

        Mail::to('tanwanishaan@gmail.com')->send(new DemoMail($mailData));

           

        dd("Email is sent successfully.");
}
}
