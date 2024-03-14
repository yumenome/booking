<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deparment extends Model
{
    use HasFactory;

    public function doctors(){
        return $this->hasMany(User::class)->where('is_doctor', true);
    }
}
