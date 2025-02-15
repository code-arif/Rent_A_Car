<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $guard = ['admin', 'customer'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    //relation with rental table
    public function rents(){
        return $this->hasMany(Rental::class);
    }
}
