<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
class RatingController extends Controller
{
    public function add_rate(Request $request ,$bid)
    {
        
        $rate=$request->input('product_rating');
        $comments=$request->input('review');
        $rating=new Rating();
        $rating->booking_id=$bid;
    
        $rating->star_rating=$rate;
        $rating->comments=$comments;
        $rating->save();
        return redirect()->back()->with('msg','your review is added');
    }
}
