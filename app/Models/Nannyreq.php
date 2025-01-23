<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nannyreq extends Model
{
    protected $table="nannyreq";
    protected $casts = [
        
        'ages' =>'array' ,
    ];
    use HasFactory;
}
