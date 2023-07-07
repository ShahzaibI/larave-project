<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category_name' => 'Syrup',
                'category_description' => 'Syrup category',
            ],
            [
                'category_name' => 'Tablet',
                'category_description' => 'Tablet category',
            ],
            [
                'category_name' => 'Injection',
                'category_description' => 'Injection category',
            ],
            [
                'category_name' => 'Cream',
                'category_description' => 'Cream category',
            ],
            [
                'category_name' => 'Capsule',
                'category_description' => 'Capsule category',
            ],
            [
                'category_name' => 'Vaccine',
                'category_description' => 'Vaccine category',
            ],
        ];
        foreach($categories as $category)
        {
            CategoryFactory::new()->create($category);
            // Category::factory()->create([
            //     'category_name' => $category['category_name'],
            //     'category_description' => $category['category_name'],
            // ]);
        }
    }
}
