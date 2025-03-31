<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Helper;

class ReqAgainController extends Controller
{
    private function initializeGlobalInteger($email)
    {
        $cacheKey = "global_integer_{$email}";

        if (!Cache::has($cacheKey)) {
            Cache::forever($cacheKey, 0);
        }
    }

    public function index(Request $request)
    {
        $email = $request->input('email');

        if (!$email) {
            return redirect()->back()->with('msg2', 'Email is required');
        }

        $this->initializeGlobalInteger($email);
        $cacheKey = "global_integer_{$email}";
        $value = Cache::get($cacheKey);

        if ($value == 3) {
            return redirect()->back()->with('msg2', 'You have been blocked');
        } else {
            $value += 1;
            Cache::forever($cacheKey, $value);

            // Get a single helper instance
            $helper = Helper::whereHas('user', function ($query) use ($email) {
                $query->where('email', $email);
            })->first(); // Fetch only one record

            if ($helper) {
                $helper->status = "pending";
                $helper->save(); // Save updated status
                return redirect()->back()->with('msg', 'Your request has been accepted');
            } else {
                return redirect()->back()->with('msg2', 'Helper not found');
            }
        }
    }
}
