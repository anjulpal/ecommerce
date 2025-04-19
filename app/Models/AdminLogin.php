<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Correct base class
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminLogin extends Authenticatable
{
    use HasFactory;

    protected $table = "user"; 
    protected $fillable = [
        'email',
        'password',
    ];
}
