<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 

class createseva extends Model
{
    protected $table='createseva';
    use HasFactory;
    public function address(): BelongsTo
    {
        return $this->belongsTo(Useradd::class,'useradd_id');
    }
}
