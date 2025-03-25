<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helper;

class AddHelperController extends Controller
{
    public function accepthelp($id)
    {
        $helper=Helper::find($id);
        $helper->status='accepted';
        $helper->save();
        return redirect()->back()->with('msg','you have accepted the client');
    }

    public function rejecthelp($id)
    {
        $helper=Helper::find($id);
        $helper->status='rejected';
        $helper->save();
        return redirect()->back()->with('msg1','you have rejected the client');
    }
}
