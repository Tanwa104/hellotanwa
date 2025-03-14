<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
       
        'email','userrole','name','lastname','phone','gender','DOB',
       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function address(): HasMany
    {
        return $this->hasMany(UserAdd::class);
    }
    // public function helpers(): BelongsToMany
    // {
    //     return $this->belongsToMany(Helper::class,'help_user');
    // }
    public function bookings()  
    {  
        return $this->hasMany(Booking::class, 'user_id');  
    }  

    public function helperBookings()  
    {  
        return $this->hasMany(Booking::class, 'helper_id');  
    }  
    public function helpers()
    {
        return $this->hasMany(Helper::class);
    }

    public function cleanerreq()
    {
        return $this->hasMany(Cleanerreq::class); 
    }
    public function nannyreq()
    {
        return $this->hasMany(Nannyreq::class);
    }
    public function cookreq()
    {
        return $this->hasMany(Cookreq::class);
    }
    

    // public function timelines(): HasOne
    // {
    //     return $this->hasOne(Timeline::class,'helpers_id','id');
    // }
    public function timeline(): HasMany
    {
        return $this->hasMany(Timeline::class);
    }
    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }
    
}
