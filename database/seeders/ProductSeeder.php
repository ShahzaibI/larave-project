<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Produts = [
            [
                'product_name' => 'Panadol',
                'product_sku' => '121',
                'product_description' => 'Panadol Original Tablets is a mild analgesic and antipyretic, and is recommended for the treatment of most painful and febrile conditions, for example, headache including migraine and tension headaches, toothache, backache, rheumatic and muscle pains, dysmenorrhoea, sore throat, and for relieving the fever.',
                'price' => 15.7,
                'stock' => 20,
                'product_image' => 'panadol.avif',
            ],
            [
                'product_name' => 'Ponstan',
                'product_sku' => '122',
                'product_description' => 'PONSTAN contains the active ingredient mefenamic acid. PONSTAN is used to relieve the symptoms of period pain and treat heavy periods. It also provides short term relief of pain in conditions such as muscle and joint injuries such as sprains, strains and tendonitis; dental pain.',
                'price' => 37,
                'stock' => 50,
                'product_image' => 'ponstan.jpg',
            ],
            [
                'product_name' => 'Flagyl',
                'product_sku' => '123',
                'product_description' => 'Metronidazole is an antibiotic that is used to treat a wide variety of infections. It works by stopping the growth of certain bacteria and parasites.This antibiotic treats only certain bacterial and parasitic infections. It will not work for viral infections (such as common cold, flu). Using any antibiotic when it is not needed can cause it to not work for future infections.Metronidazole may also be used with other medications to treat certain stomach/intestinal ulcers caused by a bacteria.',
                'price' => 21,
                'stock' => 30,
                'product_image' => 'flagyl.webp',
            ],
            [
                'product_name' => 'Vitamin D Capsules',
                'product_sku' => '124',
                'product_description' => 'Vitamin D capsules are a form of dietary supplement that contains the essential nutrient known as vitamin D. Vitamin D is a fat-soluble vitamin that plays a crucial role in maintaining overall health and well-being. It is naturally produced in the body when the skin is exposed to sunlight, and it can also be obtained through certain food sources.',
                'price' => 40,
                'stock' => 80,
                'product_image' => 'vitamin d.jpg',
            ],
            [
                'product_name' => 'Probiotic Capsules',
                'product_sku' => '125',
                'product_description' => 'Probiotic capsules are a type of dietary supplement that contains live bacteria or yeast strains that are beneficial to the human body. These capsules are designed to introduce and support the growth of healthy microorganisms in the digestive system. Probiotics are commonly referred to as "good bacteria" and are naturally found in certain foods, such as yogurt and fermented products.',
                'price' => 34,
                'stock' => 60,
                'product_image' => 'probiotic.webp',
            ],
            [
                'product_name' => 'Mupirocin Cream',
                'product_sku' => '126',
                'product_description' => 'Mupirocin cream is primarily used to treat impetigo, a highly contagious skin infection characterized by red sores and yellowish crusts. It can also be prescribed for other bacterial skin infections, such as folliculitis (inflammation of hair follicles) or minor skin wounds.',
                'price' => 35,
                'stock' => 55,
                'product_image' => 'mupirocin.webp',
            ],
        ];
        foreach($Produts as $Produt)
        {
            ProductFactory::new()->create($Produt);
        }
    }
}
