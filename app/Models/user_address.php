<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_address extends Model
{
    use HasFactory;
    
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
   

}
