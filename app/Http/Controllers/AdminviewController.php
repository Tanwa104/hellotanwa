<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminviewController extends Controller
{
    public function view()
    {
        return view('admin/dash');
    }
}
