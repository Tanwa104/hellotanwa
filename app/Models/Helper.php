<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Helper extends Model
{
    protected $table='helpers';
    use HasFactory;
    /**
         * Get the user that owns the Helper
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
       
    }
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }


    /**
     * Get the user associated with the Helper
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function timelines(): HasOne
    {
        return $this->hasOne(Timeline::class,'user_id','id');
    }
    
}
