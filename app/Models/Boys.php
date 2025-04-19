<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boys extends Model
{
    use HasFactory;

    protected $table = 'one'; // The table name in the database

    protected $fillable = ['aman', 'aryan', 'sumit']; // Valid column names

    // Define the relationship with the 'girl' model
    public function girl()
    {
        return $this->hasOne(girl::class, 'one_id'); // Points to 'one_id' in the 'one_to_one' table
    }
}
