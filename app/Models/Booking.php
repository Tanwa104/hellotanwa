<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;
    public function user()  
    {  
        return $this->belongsTo(User::class, 'user_id');  
    }  

    public function helper()  
    {  
        return $this->belongsTo(Helper::class, 'helper_id');  
    }  

    public function timeline()  
    {  
        return $this->belongsTo(Timeline::class, 'timeline_id');  
    }  

    public function userAddress()  
    {  
        return $this->belongsTo(UserAdd::class, 'useradd_id');  


    } 
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'booking_id', 'id');
    } 
}
