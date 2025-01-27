<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cookreq extends Model
{
    protected $fillable = ['ocassion', 'peopleno', 'cusine', 'user_id','mealno','description','timeline_id'];

    protected $table="cookreq";
    use HasFactory;
}
