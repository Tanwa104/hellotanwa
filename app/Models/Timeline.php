<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 

class Timeline extends Model
{
    
    protected $casts = [
        
        'weekdays' =>'array' ,
    ];
    use HasFactory;
protected $table='timelines';
    
     /* Get the user associated with the Timeline
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function helper(): BelongsTo
    // {
    //     return $this->belongsTo(Helper::class,'helpers_id');
    // }
    // // public function user(): BelongsTo
    // // {
    // //     return $this->belongsTo(User::class,'user_id');
    // // }
    // public function help(): HasOne
    // {
    //     return $this->hasOne(Timeline::class,'timeline_id');
    // }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
