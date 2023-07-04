<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'product_description', 'price', 'stock', 'product_image', 'archive'];
    public static function active()
    {
        return static::where('archive', 0);
    }
    public static function unActive()
    {
        return static::where('archive', 1);
    }

    public function getCategories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }
}
