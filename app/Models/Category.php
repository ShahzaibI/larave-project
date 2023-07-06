<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name', 'category_description'];

    // public function getProducts()
    // {
    //     return $this->belongsToMany(Product::class, 'product_category');
    // }
}
