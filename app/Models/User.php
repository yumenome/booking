<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender'
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

    public function deparment(){
        return $this->belongsTo(Deparment::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class, 'doctor_id')->whereNull('patient_id');
    }
    public function bookedBookings(){
        return $this->hasMany(Booking::class, 'patient_id')->where('is_finnish', false);
    }

    public function getImgUrl(){
        if(str_starts_with($this->doctor_photo, 'http')){
            return $this->doctor_photo;
        }
        return '/storage/' . $this->doctor_photo;
    }
}
