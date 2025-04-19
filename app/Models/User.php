<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "user"; // Make sure your table is named "user"

    protected $fillable = [
        'username',
        'useremail',
    ];

    public function books()
    {
        return $this->hasMany(Books::class, 'user_id'); // Correct relationship reference
    }
}
