<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='product';

    public $timestamps = false;

    protected $fillable = [ 
    
        'category_id',
            'name',
            'slug',
            'brand',
            'model',
            'short_desc',
            'desc',
            'keywords',
            'technical_specification',
            'uses',
            'warranty',
            'productstatus',
            'file_uploads',
          ];

          public function category()
          {
              return $this->belongsTo(Category::class, 'category_id');
          }
}
