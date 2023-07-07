<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'product_sku', 'product_description', 'price', 'stock', 'product_image', 'archive'];

    public static function active()
    {
        return static::where('archive', 0);
    }

    public function getCategories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function findProduct($id)
    {
        return $this->find($id);
    }
    public function getActiveDataWithCategories()
    {
        return $this->where('archive', 0)->with('getCategories');
    }
    public function getActiveProductsById($id)
    {
        return $this->where('id', $id)->with('getCategories')->first();
    }
    public function getUnactiveDataWithCategories()
    {
        return static::where('archive', 1)->with('getCategories');
    }

    public function getSearchedProducts($search)
    {
        return $this->where('archive', 0)->where('product_sku', 'like', '%' . $search . '%')->orWhere('product_name', 'like', '%' . $search . '%')->orWhereHas('getCategories', function ($categoryQuery) use ($search) {
            $categoryQuery->where('category_name', 'like', '%' . $search . '%');
        })->with('getCategories');
    }
}

