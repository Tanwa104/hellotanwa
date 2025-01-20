<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ViewProfileController extends Controller
{
    public function index($id)
    {
        $users=User::get();
        foreach($users as $user)
        {
            if($id==$user->id)
            {
                $items[]=$user;
            }
        }

return view('viewpro',compact('items'));
    }
}
