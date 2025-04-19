<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = "books"; // Make sure your table is named "books"

    protected $fillable = [
        'maths',
        'physics',
        'chemistry',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Correct relationship reference
    }
}

