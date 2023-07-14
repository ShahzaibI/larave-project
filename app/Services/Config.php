<?php

namespace App\Services;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\ProductCategory;

class Config
{
    public function getUserModel()
    {
        return new User();
    }
    public function getProductModel()
    {
        return new Product();
    }
    public function getOrderModel()
    {
        return new Order();
    }
    public function getCategoryModel()
    {
        return new Category();
    }
    public function getProductCategoryModel()
    {
        return new ProductCategory();
    }
}
