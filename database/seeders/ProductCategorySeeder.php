<?php

namespace Database\Seeders;

use Database\Factories\ProductCategoryFactory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Product_category = [
            [
                'product_id' => 1,
                'category_id' => 2,
            ],
            [
                'product_id' => 2,
                'category_id' => 1,
            ],
            [
                'product_id' => 3,
                'category_id' => 1,
            ],
            [
                'product_id' => 4,
                'category_id' => 5,
            ],
            [
                'product_id' => 5,
                'category_id' => 5,
            ],
            [
                'product_id' => 6,
                'category_id' => 4,
            ]
        ];
        foreach ($Product_category as $data)
        {
            ProductCategoryFactory::new()->create($data);
        }
    }
}
