<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cookreq extends Model
{
    protected $fillable = ['occasion', 'age', 'gender', 'user_id'];

    protected $table="cookreq";
    use HasFactory;
}
