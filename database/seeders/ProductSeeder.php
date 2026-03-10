<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Clean existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_tag')->truncate();
        DB::table('products')->truncate();
        DB::table('product_categories')->truncate();
        DB::table('product_tags')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // ── Tags ─────────────────────────────────────────────────────────────
        $tagDefs = [
            'Baby Food',
            'Organic',
            'Natural',
            'No Preservatives',
            'Gluten Free',
            'Vegan',
            'Fruit Based',
            'Vegetable Based',
            'Grain Based',
            'Dairy Free',
            'Snack',
        ];

        $tags = [];
        foreach ($tagDefs as $name) {
            $tags[$name] = ProductTag::create([
                'name'      => $name,
                'slug'      => Str::slug($name),
                'is_active' => true,
            ]);
        }

        // ── Categories ───────────────────────────────────────────────────────
        $categoryDefs = [
            'Sweetener' => 'Natural and healthy sweeteners for babies and toddlers.',
            'Cereal'    => 'Nutritious cereals crafted for growing babies.',
            'Puffs'     => 'Light and crunchy puffs made with natural ingredients.',
            'Puree'     => 'Smooth and tasty fruit and vegetable purees for babies.',
            'Melts'     => 'Dissolving melt snacks perfect for little ones.',
            'Curry Mix' => 'Mild and wholesome curry mixes suitable for babies.',
        ];

        $cats = [];
        foreach ($categoryDefs as $name => $desc) {
            $cats[$name] = ProductCategory::create([
                'name'        => $name,
                'slug'        => Str::slug($name),
                'description' => $desc,
                'is_active'   => true,
            ]);
        }

        // ── Products ─────────────────────────────────────────────────────────
        // [sku, category, title, retail_price, discounted_price, qty, tags[]]
        $products = [
            [
                'sku'        => 'H48',
                'category'   => 'Sweetener',
                'title'      => 'Happa Dates Powder (200g)',
                'retail'     => 850,
                'discounted' => 750,
                'qty'        => 120,
                'tags'       => ['Baby Food', 'Natural', 'Organic', 'No Preservatives', 'Vegan'],
            ],
            [
                'sku'        => 'H44',
                'category'   => 'Cereal',
                'title'      => 'Happa Cereal Brown Rice (200g)',
                'retail'     => 950,
                'discounted' => 850,
                'qty'        => 200,
                'tags'       => ['Baby Food', 'Grain Based', 'Natural', 'No Preservatives', 'Gluten Free'],
            ],
            [
                'sku'        => 'E3-LI0Q-V148',
                'category'   => 'Cereal',
                'title'      => 'Happa Cereal Brown Rice+Apple+Banana (200g)',
                'retail'     => 950,
                'discounted' => 850,
                'qty'        => 180,
                'tags'       => ['Baby Food', 'Grain Based', 'Fruit Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H58',
                'category'   => 'Cereal',
                'title'      => 'Happa Cereal Oatmeal (200g)',
                'retail'     => 950,
                'discounted' => 850,
                'qty'        => 150,
                'tags'       => ['Baby Food', 'Grain Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H44',
                'category'   => 'Cereal',
                'title'      => 'Happa Cereal Oatmeal+Banana (200g)',
                'retail'     => 950,
                'discounted' => 850,
                'qty'        => 160,
                'tags'       => ['Baby Food', 'Grain Based', 'Fruit Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H47',
                'category'   => 'Cereal',
                'title'      => 'Happa Cereal Sathu Maavu (200g)',
                'retail'     => 950,
                'discounted' => 850,
                'qty'        => 140,
                'tags'       => ['Baby Food', 'Grain Based', 'Natural', 'No Preservatives', 'Vegan'],
            ],
            [
                'sku'        => 'H37',
                'category'   => 'Cereal',
                'title'      => 'Happa Cereal Spr. Ragi+Almonds+Dates (200g)',
                'retail'     => 1050,
                'discounted' => 950,
                'qty'        => 130,
                'tags'       => ['Baby Food', 'Grain Based', 'Natural', 'No Preservatives', 'Organic'],
            ],
            [
                'sku'        => 'H39',
                'category'   => 'Cereal',
                'title'      => 'Happa Cereal Spr. Ragi+Mango+Banana (200g)',
                'retail'     => 1050,
                'discounted' => 950,
                'qty'        => 130,
                'tags'       => ['Baby Food', 'Grain Based', 'Fruit Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H40',
                'category'   => 'Cereal',
                'title'      => 'Happa Cereal Spr. Ragi+Carrot+Beetroot (200g)',
                'retail'     => 1050,
                'discounted' => 950,
                'qty'        => 130,
                'tags'       => ['Baby Food', 'Grain Based', 'Vegetable Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H38',
                'category'   => 'Cereal',
                'title'      => 'Happa Cereal Spr. Ragi+Cardamom (200g)',
                'retail'     => 1050,
                'discounted' => 950,
                'qty'        => 130,
                'tags'       => ['Baby Food', 'Grain Based', 'Natural', 'No Preservatives', 'Organic'],
            ],
            [
                'sku'        => 'H60',
                'category'   => 'Puffs',
                'title'      => 'Happa Super Puffs Vanilla + Blueberry (40g)',
                'retail'     => 650,
                'discounted' => 590,
                'qty'        => 300,
                'tags'       => ['Baby Food', 'Snack', 'Natural', 'No Preservatives', 'Dairy Free'],
            ],
            [
                'sku'        => 'H56',
                'category'   => 'Puffs',
                'title'      => 'Happa Super Puffs Apple + Cinnamon (40g)',
                'retail'     => 650,
                'discounted' => 590,
                'qty'        => 280,
                'tags'       => ['Baby Food', 'Snack', 'Fruit Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H59',
                'category'   => 'Puffs',
                'title'      => 'Happa Super Puffs Strawberry + Banana (40g)',
                'retail'     => 650,
                'discounted' => 590,
                'qty'        => 280,
                'tags'       => ['Baby Food', 'Snack', 'Fruit Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H60',
                'category'   => 'Puffs',
                'title'      => 'Happa Super Puffs Carrot + Beetroot (40g)',
                'retail'     => 650,
                'discounted' => 590,
                'qty'        => 280,
                'tags'       => ['Baby Food', 'Snack', 'Vegetable Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'VL-YSYE-WRY3',
                'category'   => 'Sweetener',
                'title'      => 'Himalayan Golden Honey',
                'retail'     => 1200,
                'discounted' => 1050,
                'qty'        => 100,
                'tags'       => ['Natural', 'Organic', 'No Preservatives', 'Vegan'],
            ],
            [
                'sku'        => 'H01',
                'category'   => 'Puree',
                'title'      => 'Happa Apple + Mango Puree (100g)',
                'retail'     => 450,
                'discounted' => 400,
                'qty'        => 250,
                'tags'       => ['Baby Food', 'Fruit Based', 'Natural', 'No Preservatives', 'Vegan'],
            ],
            [
                'sku'        => 'H02',
                'category'   => 'Puree',
                'title'      => 'Happa Apple + Banana Puree (100g)',
                'retail'     => 450,
                'discounted' => 400,
                'qty'        => 250,
                'tags'       => ['Baby Food', 'Fruit Based', 'Natural', 'No Preservatives', 'Vegan'],
            ],
            [
                'sku'        => 'H29',
                'category'   => 'Puree',
                'title'      => 'Happa Mango + Banana Puree (100g)',
                'retail'     => 450,
                'discounted' => 400,
                'qty'        => 230,
                'tags'       => ['Baby Food', 'Fruit Based', 'Natural', 'No Preservatives', 'Vegan'],
            ],
            [
                'sku'        => 'H30',
                'category'   => 'Puree',
                'title'      => 'Happa Sweet Potato + Mango + Pear (100g)',
                'retail'     => 490,
                'discounted' => 440,
                'qty'        => 220,
                'tags'       => ['Baby Food', 'Fruit Based', 'Vegetable Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H03',
                'category'   => 'Puree',
                'title'      => 'Happa Apple + Oats Puree (100g)',
                'retail'     => 490,
                'discounted' => 440,
                'qty'        => 220,
                'tags'       => ['Baby Food', 'Fruit Based', 'Grain Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H05',
                'category'   => 'Puree',
                'title'      => 'Happa Only Apple Puree (100g)',
                'retail'     => 420,
                'discounted' => 380,
                'qty'        => 260,
                'tags'       => ['Baby Food', 'Fruit Based', 'Organic', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H04',
                'category'   => 'Puree',
                'title'      => 'Happa Apple + Mango + Multigrain Puree (100g)',
                'retail'     => 490,
                'discounted' => 440,
                'qty'        => 240,
                'tags'       => ['Baby Food', 'Fruit Based', 'Grain Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H06',
                'category'   => 'Puree',
                'title'      => 'Happa Sweet Potato + Spinach Puree (100g)',
                'retail'     => 490,
                'discounted' => 440,
                'qty'        => 230,
                'tags'       => ['Baby Food', 'Vegetable Based', 'Natural', 'No Preservatives', 'Vegan'],
            ],
            [
                'sku'        => 'H107',
                'category'   => 'Melts',
                'title'      => 'Happa Jamun Melts',
                'retail'     => 550,
                'discounted' => 490,
                'qty'        => 200,
                'tags'       => ['Baby Food', 'Snack', 'Fruit Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H108',
                'category'   => 'Melts',
                'title'      => 'Happa Mango Melts',
                'retail'     => 550,
                'discounted' => 490,
                'qty'        => 200,
                'tags'       => ['Baby Food', 'Snack', 'Fruit Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H109',
                'category'   => 'Melts',
                'title'      => 'Happa Yogo Melts Blueberry Yogurt',
                'retail'     => 590,
                'discounted' => 520,
                'qty'        => 180,
                'tags'       => ['Baby Food', 'Snack', 'Fruit Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'H110',
                'category'   => 'Melts',
                'title'      => 'Happa Yogo Melts Strawberry Yogurt',
                'retail'     => 590,
                'discounted' => 520,
                'qty'        => 180,
                'tags'       => ['Baby Food', 'Snack', 'Fruit Based', 'Natural', 'No Preservatives'],
            ],
            [
                'sku'        => 'A010',
                'category'   => 'Curry Mix',
                'title'      => 'Aromat Baby Curry Mix (100g)',
                'retail'     => 750,
                'discounted' => 680,
                'qty'        => 150,
                'tags'       => ['Baby Food', 'Natural', 'No Preservatives', 'Vegan', 'Vegetable Based'],
            ],
        ];

        foreach ($products as $data) {
            $slug = Str::slug($data['title']);
            $uniqueSlug = $slug;
            $counter = 1;
            while (Product::where('slug', $uniqueSlug)->exists()) {
                $uniqueSlug = $slug . '-' . $counter++;
            }

            $product = Product::create([
                'title'               => $data['title'],
                'slug'                => $uniqueSlug,
                'meta_title'          => $data['title'],
                'meta_description'    => 'Buy ' . $data['title'] . ' online. A premium quality baby food product by Aromat.',
                'meta_keyword'        => strtolower(str_replace(['+', '  '], [',', ' '], $data['title'])),
                'product_category_id' => $cats[$data['category']]->id,
                'description'         => '<p>' . $data['title'] . ' is a premium quality baby food product carefully crafted with natural ingredients. Suitable for babies aged 6 months and above. Free from artificial colours, flavours, and preservatives.</p>',
                'main_img'            => null,
                'other_img'           => null,
                'product_code'        => $data['sku'],
                'retail_price'        => $data['retail'],
                'discounted_price'    => $data['discounted'],
                'qty'                 => $data['qty'],
                'product_status'      => 'in_stock',
                'is_active'           => true,
            ]);

            // Attach tags
            $tagIds = collect($data['tags'])->map(fn ($name) => $tags[$name]->id)->toArray();
            $product->tags()->sync($tagIds);
        }
    }
}
