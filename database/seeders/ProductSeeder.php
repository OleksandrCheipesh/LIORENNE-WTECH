<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Men', 'Women', 'Kids & Baby', 'Home', 'Accessories', 'Gifts'];
        $brands = ['Liorenne', 'Maison L', 'Atelier V', 'Studio N'];
        $colors = ['Black', 'White', 'Brown', 'Navy', 'Ivory', 'Camel'];
        $sizes = ['XS', 'S', 'M', 'L', 'XL'];

        $products = [
            // Men (25 products — enough for 3 pages at 9 per page)
            ['name' => 'Polo Shirt',           'category' => 'Men', 'price' => 89,  'original_price' => null, 'brand' => 'Liorenne',  'color' => 'Navy',  'sizes' => ['S','M','L'],      'stock' => 32],
            ['name' => 'Linen Blazer',         'category' => 'Men', 'price' => 220, 'original_price' => 310,  'brand' => 'Maison L',  'color' => 'Camel', 'sizes' => ['M','L','XL'],     'stock' => 10],
            ['name' => 'Slim Chinos',          'category' => 'Men', 'price' => 110, 'original_price' => null, 'brand' => 'Liorenne',  'color' => 'Brown', 'sizes' => ['S','M','L','XL'], 'stock' => 25],
            ['name' => 'Oxford Shirt',         'category' => 'Men', 'price' => 95,  'original_price' => null, 'brand' => 'Atelier V', 'color' => 'White', 'sizes' => ['S','M'],          'stock' => 18],
            ['name' => 'Wool Overcoat',        'category' => 'Men', 'price' => 450, 'original_price' => 600,  'brand' => 'Maison L',  'color' => 'Black', 'sizes' => ['M','L'],          'stock' => 5],
            ['name' => 'Merino Turtleneck',    'category' => 'Men', 'price' => 175, 'original_price' => null, 'brand' => 'Atelier V', 'color' => 'Ivory', 'sizes' => ['S','M','L'],      'stock' => 14],
            ['name' => 'Tailored Trousers',    'category' => 'Men', 'price' => 165, 'original_price' => 210,  'brand' => 'Liorenne',  'color' => 'Black', 'sizes' => ['S','M','L','XL'], 'stock' => 20],
            ['name' => 'Denim Jacket',         'category' => 'Men', 'price' => 195, 'original_price' => null, 'brand' => 'Studio N',  'color' => 'Navy',  'sizes' => ['M','L','XL'],     'stock' => 9],
            ['name' => 'Cashmere Scarf',       'category' => 'Men', 'price' => 120, 'original_price' => null, 'brand' => 'Maison L',  'color' => 'Camel', 'sizes' => [],                 'stock' => 30],
            ['name' => 'Leather Derby Shoes',  'category' => 'Men', 'price' => 340, 'original_price' => 420,  'brand' => 'Liorenne',  'color' => 'Brown', 'sizes' => [],                 'stock' => 8],
            ['name' => 'Quilted Vest',         'category' => 'Men', 'price' => 145, 'original_price' => null, 'brand' => 'Atelier V', 'color' => 'Navy',  'sizes' => ['S','M','L'],      'stock' => 16],
            ['name' => 'Striped Linen Shirt',  'category' => 'Men', 'price' => 105, 'original_price' => null, 'brand' => 'Studio N',  'color' => 'White', 'sizes' => ['S','M','L'],      'stock' => 22],
            ['name' => 'Suede Chelsea Boots',  'category' => 'Men', 'price' => 390, 'original_price' => 480,  'brand' => 'Maison L',  'color' => 'Brown', 'sizes' => [],                 'stock' => 6],
            ['name' => 'Cotton Crewneck',      'category' => 'Men', 'price' => 85,  'original_price' => null, 'brand' => 'Liorenne',  'color' => 'White', 'sizes' => ['XS','S','M','L'], 'stock' => 35],
            ['name' => 'Double-Breasted Suit', 'category' => 'Men', 'price' => 680, 'original_price' => 850,  'brand' => 'Maison L',  'color' => 'Navy',  'sizes' => ['M','L'],          'stock' => 4],
            ['name' => 'Knit Polo',            'category' => 'Men', 'price' => 98,  'original_price' => null, 'brand' => 'Atelier V', 'color' => 'Camel', 'sizes' => ['S','M','L'],      'stock' => 19],
            ['name' => 'Pleated Shorts',       'category' => 'Men', 'price' => 75,  'original_price' => null, 'brand' => 'Studio N',  'color' => 'Ivory', 'sizes' => ['S','M','L','XL'], 'stock' => 28],
            ['name' => 'Trench Coat',          'category' => 'Men', 'price' => 520, 'original_price' => 640,  'brand' => 'Liorenne',  'color' => 'Camel', 'sizes' => ['M','L','XL'],     'stock' => 7],
            ['name' => 'Ribbed Tank',          'category' => 'Men', 'price' => 55,  'original_price' => null, 'brand' => 'Studio N',  'color' => 'White', 'sizes' => ['S','M','L'],      'stock' => 40],
            ['name' => 'Wool Flat Cap',        'category' => 'Men', 'price' => 65,  'original_price' => null, 'brand' => 'Atelier V', 'color' => 'Brown', 'sizes' => [],                 'stock' => 15],
            ['name' => 'Slim Suit Jacket',     'category' => 'Men', 'price' => 420, 'original_price' => null, 'brand' => 'Maison L',  'color' => 'Black', 'sizes' => ['S','M','L'],      'stock' => 11],
            ['name' => 'Linen Drawstring Pant','category' => 'Men', 'price' => 95,  'original_price' => null, 'brand' => 'Liorenne',  'color' => 'Ivory', 'sizes' => ['S','M','L','XL'], 'stock' => 23],
            ['name' => 'Graphic Tee',          'category' => 'Men', 'price' => 60,  'original_price' => null, 'brand' => 'Studio N',  'color' => 'Black', 'sizes' => ['XS','S','M','L'], 'stock' => 50],
            ['name' => 'Leather Belt',         'category' => 'Men', 'price' => 110, 'original_price' => 140,  'brand' => 'Liorenne',  'color' => 'Brown', 'sizes' => [],                 'stock' => 17],
            ['name' => 'Puffer Jacket',        'category' => 'Men', 'price' => 310, 'original_price' => null, 'brand' => 'Atelier V', 'color' => 'Navy',  'sizes' => ['M','L','XL'],     'stock' => 12],

            // Women
            ['name' => 'Silk Evening Dress', 'category' => 'Women',     'price' => 189, 'original_price' => null, 'brand' => 'Liorenne',  'color' => 'Ivory', 'sizes' => ['XS','S','M'],    'stock' => 14],
            ['name' => 'Cashmere Sweater',   'category' => 'Women',     'price' => 245, 'original_price' => null, 'brand' => 'Atelier V', 'color' => 'Camel', 'sizes' => ['S','M','L'],     'stock' => 3],
            ['name' => 'Wide-Leg Trousers',  'category' => 'Women',     'price' => 135, 'original_price' => 180,  'brand' => 'Studio N',  'color' => 'Black', 'sizes' => ['XS','S','M','L'],'stock' => 20],
            ['name' => 'Linen Midi Skirt',   'category' => 'Women',     'price' => 99,  'original_price' => null, 'brand' => 'Liorenne',  'color' => 'White', 'sizes' => ['XS','S'],        'stock' => 12],
            ['name' => 'Trench Coat',        'category' => 'Women',     'price' => 380, 'original_price' => 480,  'brand' => 'Maison L',  'color' => 'Camel', 'sizes' => ['S','M','L'],     'stock' => 7],

            // Kids & Baby
            ['name' => 'Kids Parka Jacket',  'category' => 'Kids & Baby','price' => 95, 'original_price' => null, 'brand' => 'Liorenne',  'color' => 'Navy',  'sizes' => ['XS','S'],        'stock' => 27],
            ['name' => 'Baby Onesie Set',    'category' => 'Kids & Baby','price' => 45, 'original_price' => null, 'brand' => 'Studio N',  'color' => 'White', 'sizes' => ['XS'],            'stock' => 40],

            // Accessories
            ['name' => 'Leather Belt Bag',   'category' => 'Accessories','price' => 320,'original_price' => null, 'brand' => 'Liorenne',  'color' => 'Brown', 'sizes' => [],               'stock' => 0],
            ['name' => 'Silk Scarf',         'category' => 'Accessories','price' => 85, 'original_price' => null, 'brand' => 'Maison L',  'color' => 'Ivory', 'sizes' => [],               'stock' => 22],
            ['name' => 'Leather Gloves',     'category' => 'Accessories','price' => 110,'original_price' => 140,  'brand' => 'Atelier V', 'color' => 'Black', 'sizes' => ['S','M','L'],     'stock' => 15],

            // Home
            ['name' => 'Linen Cushion Cover','category' => 'Home',      'price' => 55, 'original_price' => null, 'brand' => 'Studio N',  'color' => 'Ivory', 'sizes' => [],               'stock' => 30],
            ['name' => 'Scented Candle',     'category' => 'Home',      'price' => 40, 'original_price' => null, 'brand' => 'Liorenne',  'color' => 'White', 'sizes' => [],               'stock' => 50],

            // Gifts
            ['name' => 'Gift Set — Her',     'category' => 'Gifts',     'price' => 150,'original_price' => null, 'brand' => 'Liorenne',  'color' => 'Ivory', 'sizes' => [],               'stock' => 10],
            ['name' => 'Gift Set — Him',     'category' => 'Gifts',     'price' => 150,'original_price' => null, 'brand' => 'Liorenne',  'color' => 'Black', 'sizes' => [],               'stock' => 10],
            ['name' => 'Gift Voucher €100',  'category' => 'Gifts',     'price' => 100,'original_price' => null, 'brand' => 'Liorenne',  'color' => null,    'sizes' => [],               'stock' => 999],
        ];

        foreach ($products as $product) {
            Product::create([
                'name'           => $product['name'],
                'category'       => $product['category'],
                'price'          => $product['price'],
                'original_price' => $product['original_price'],
                'brand'          => $product['brand'],
                'color'          => $product['color'],
                'sizes'          => $product['sizes'],
                'stock'          => $product['stock'],
                'description'    => 'Premium quality ' . strtolower($product['name']) . ' from the Liorenne collection.',
                'image'          => null,
            ]);
        }
    }
}
