<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
 

class UserAdd extends Model
{
    protected $table='user_address';
    use HasFactory;
    protected static function boot() 

    {

        parent::boot();



        static::creating(function (UserAdd $user_address) {

            $user_address->area = Str::title( $user_address->area);
            $user_address->city = Str::title( $user_address->city); 
            $user_address->state = Str::title( $user_address->state); 
            $user_address->country = Str::title( $user_address->country);
             // Capitalize first letter of 'name' field

        });

    }
    

    public function Createseva(): HasMany
    {
        return $this->hasMany(createseva::class,'useradd_id','id');
    }

}

