<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cleanerreq;
use App\Models\Nannyreq;
use App\Models\Cookreq;


class ReqController extends Controller
{
    public function udclean(Request $request)
    {
        $validated = $request->validate([
            'typeclean' => 'required|string',
        ]);
        $uid=auth()->user()->id;
        $place=$request->input('place');
        $bedno=$request->input('bedno');
        $hallno=$request->input('hallno');
        $kitchen=$request->input('kitchen');
        $typeclean=$request->input('typeclean');
        $clean=new Cleanerreq();
        $clean->user_id=$uid;
        $clean->hometype=$place;
        $clean->bedroomno=$bedno;
        $clean->hallno=$hallno;
        $clean->kichenno=$kitchen;
        $clean->cleaningtype=$typeclean;
        $clean->save();
        return redirect()->route('bvcleaner.build');
    }
    public function udnanny(Request $request)
    {
        $uid=auth()->user()->id;
        
        $validatedData = $request->validate([
            'childno' => 'required|integer|min:1',
            'Age' => 'required|array', // Validate that Age is an array
            'Name' => 'required|array', // Validate that Name is an array
            'Gender' => 'required|array', // Validate that Gender is an array
        ]);
    
        // Store the children data in the database
        for ($i = 0; $i < $validatedData['childno']; $i++) {
            Nannyreq::create([
                'childname' => $validatedData['Name'][$i],
                'childage' => $validatedData['Age'][$i],
                'childgender' => $validatedData['Gender'][$i],
                'user_id' => $uid, // Save the user_id with the child data
            ]);
        }
        
        return redirect()->route('bvnanny.build');
    }
    public function udcook(Request $request)
    {
        $uid=auth()->user()->id;
        $validatedData = $request->validate([
            'occasion' => 'required|string',
            'peopleno' => 'required|integer',
            'cus' => 'required|string',
            'meals' => 'required|integer',
            'mealDescription' => 'required|array', // Validate that mealDescription is an array
        ]);

        // Store the cooking details in the database
        for ($i = 1; $i <= $validatedData['meals']; $i++) {
            // Save each meal description with the related data
            Cookreq::create([
                'ocassion' => $validatedData['occasion'],
                'peopleno' => $validatedData['peopleno'],
                'cusine' => $validatedData['cus'],
                'description' => $validatedData['mealDescription'][$i], // Storing meal description
                'mealno' => $i,
                'user_id'=> $uid,// Save the meal number
            ]);

    }
}
}