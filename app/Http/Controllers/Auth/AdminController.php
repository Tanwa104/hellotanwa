<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/addlog'); // Show admin login form
    }

    public function create(Request $request)
    {
        // Validate login credentials
        $request->validate([
            'email' => 'required|email',
            'pass' => 'required',
        ]);

        // Get the admin user with the provided email
        $user = User::where('email', $request->input('email'))
                    ->where('userrole', 'admin')
                    ->first();

        // Check if user exists and password matches (without hashing)
        if ($user && $request->input('pass') === $user->password) {
            // Authenticate the admin
            Auth::login($user);

            // Regenerate session
            $request->session()->regenerate();

            // Redirect to admin dashboard
            return redirect()->route('admin.dashboard')->with('status', 'Welcome Admin!');
        }

        // If authentication fails, return back with an error message
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }
}
