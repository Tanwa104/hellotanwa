<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nannyreq extends Model
{
    protected $table="nannyreq";
    protected $fillable = ['childname', 'childage', 'childgender', 'user_id','timeline_id'];


    public function usernan()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
