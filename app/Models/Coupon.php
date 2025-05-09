<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = "coupon";

    public $timestamps = false;


    protected $fillable = [

        'coupon_tittle',
        'coupon',
        'value',
        'couponstatus'
    ];
}
