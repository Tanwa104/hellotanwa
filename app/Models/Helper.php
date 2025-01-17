<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Helper extends Model
{
    protected $table='helpers';
    use HasFactory;
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
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
