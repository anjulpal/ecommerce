<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class girl extends Model
{
    use HasFactory;

    protected $table = 'one_to_one'; // The table name in the database

    protected $fillable = ['sapna', 'simran', 'anjali', 'one_id']; // Valid column names

    // Define the relationship with the 'Boys' model
    public function boys()
    {
        return $this->belongsTo(Boys::class, 'one_id'); // Points to 'one_id' in the 'one_to_one' table
    }
}
