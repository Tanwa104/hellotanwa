<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAdd;
use App\Providers\RouteServiceProvider;
class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $uid=auth()->user()->id;
        $add=new UserAdd();
        
        $add1=$request->input('address1');
        $add2=$request->input('address2');
        $city=$request->input('city');
        $state=$request->input('state');
        $country=$request->input('country');
        $zip=$request->input('zip');
        $add->user_id=$uid;
        $add->address_line_1=$add1;
        $add->address_line_2=$add2;
        $add->city=$city;
        $add->state=$state;
        $add->country=$country;
        $add->pincode=$zip;
        $add->save();
return redirect()->back();
        

        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
