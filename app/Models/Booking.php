<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo(User::class);
    }
    public function doctor(){
        return $this->belongsTo(User::class);
    }
}
