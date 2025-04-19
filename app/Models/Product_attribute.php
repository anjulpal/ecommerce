<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_attribute extends Model
{
    use HasFactory;

    protected $table = "product_attribute";

    public $timestamps = false;


    protected $fillable = [

        'sku',
        'mrp',
        'quantity',
        'price',
        'product_attribute_image',
        'color_id',
        'size_id',
        'product_id',
        'category_id',
    ];

    public function color()
    {
       return $this->belongsTo(color::class, 'color_id',);
    }

    public function size(){

        return $this->belongsTo(size::class, 'size_id');
    }

    public function category(){

        return $this->belongsTo(category::class, 'category_id');
    }
}
