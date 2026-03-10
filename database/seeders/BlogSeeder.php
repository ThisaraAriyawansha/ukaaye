<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Categories (same as before + one extra)
        $categories = [
            ['name' => 'Baby Nutrition Tips', 'description' => 'Practical advice on feeding and nourishing your baby the healthy way.'],
            ['name' => 'Parenting in Sri Lanka', 'description' => 'Challenges, joys, and local solutions for raising children in Sri Lanka.'],
            ['name' => 'Aromat Stories', 'description' => 'Behind the scenes, our journey, values and what drives Aromat.'],
            ['name' => 'Homemade Baby Food', 'description' => 'Simple, safe Sri Lankan-inspired recipes for babies 6+ months.'],
            ['name' => 'Product Spotlights', 'description' => 'Learn more about our cereals, puffs, curry mixes, yogurts and more.'],
            ['name' => 'Baby Development & Health', 'description' => 'Supporting growth, immunity, and milestones with good nutrition.'],
        ];

        $categoryModels = [];
        foreach ($categories as $cat) {
            $categoryModels[$cat['name']] = BlogCategory::firstOrCreate(
                ['name' => $cat['name']],
                [
                    'slug'        => Str::slug($cat['name']),
                    'description' => $cat['description'],
                    'is_active'   => true,
                ]
            );
        }

        // 2. Tags (expanded a bit)
        $tagsData = [
            '6 months+', 'weaning', 'organic', 'no added sugar', 'Sri Lankan ingredients',
            'affordable baby food', 'parenting tips', 'baby health', 'iron rich foods',
            'finger foods', 'breakfast ideas', 'travel with baby', 'kurakkan', 'immunity booster',
            'natural sweetness', 'baby yogurt', 'puffs & biscuits',
        ];

        $tagModels = [];
        foreach ($tagsData as $tagName) {
            $tag = BlogTag::firstOrCreate(
                ['name' => $tagName],
                [
                    'slug'      => Str::slug($tagName),
                    'is_active' => true,
                ]
            );
            $tagModels[$tagName] = $tag;
        }

        // 3. 10 Sample Blog Posts
        $blogs = [
            // 1
            [
                'title'       => 'Starting Solids the Sri Lankan Way – Safe & Simple Guide',
                'category'    => 'Baby Nutrition Tips',
                'tags'        => ['6 months+', 'weaning', 'Sri Lankan ingredients'],
                'author'      => 'Aromat Nutrition Team',
                'date'        => now()->subDays(10),
                'excerpt'     => 'When your baby turns 6 months, here’s how to begin with trusted local ingredients...',
                'content'     => '<p>As parents ourselves, we know the worry that comes with starting solids. In Sri Lanka we’re lucky to have natural foods like ripe papaya, banana, kurakkan, and steamed carrots.</p><p>Start single-ingredient purees for 3–4 days, watch for reactions, then mix. Our no-added-sugar cereals make this transition easy and safe.</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],

            // 2
            [
                'title'       => 'Why Affordable Premium Baby Food Matters in Sri Lanka',
                'category'    => 'Aromat Stories',
                'tags'        => ['affordable baby food', 'Sri Lankan ingredients'],
                'author'      => 'Thisara – Aromat Founder',
                'date'        => now()->subDays(18),
                'excerpt'     => 'Our journey from frustration to solution – making quality nutrition reachable for every family.',
                'content'     => '<p>Imported baby food was often too expensive, and cheaper options had additives we didn’t trust. That’s why we manufacture right here in Piliyandala – using local grains and fruits to keep prices fair without compromising quality.</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],

            // 3
            [
                'title'       => '5 Iron-Rich First Foods Every Sri Lankan Baby Needs',
                'category'    => 'Baby Nutrition Tips',
                'tags'        => ['iron rich foods', '6 months+', 'kurakkan'],
                'author'      => 'Aromat Nutrition Team',
                'date'        => now()->subDays(5),
                'excerpt'     => 'Prevent anaemia naturally with these everyday Sri Lankan ingredients.',
                'content'     => '<ul><li>Kurakkan porridge – nature’s iron powerhouse</li><li>Mashed dhal with red rice</li><li>Beetroot puree</li><li>Our fortified baby cereal</li><li>Ragi laddus (small amounts for older babies)</li></ul><p>Pair with vitamin-C fruits like wood apple for better absorption.</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],

            // 4
            [
                'title'       => 'No-Added-Sugar Baby Biscuits – Safe First Finger Foods',
                'category'    => 'Product Spotlights',
                'tags'        => ['finger foods', 'no added sugar', 'puffs & biscuits'],
                'author'      => 'Aromat Team',
                'date'        => now()->subDays(7),
                'excerpt'     => 'Perfect shape, perfect texture – made for little hands and growing teeth.',
                'content'     => '<p>Many store biscuits have hidden sugar. Ours use rice flour, ragi, banana powder, and coconut – dissolving easily while encouraging self-feeding.</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],

            // 5
            [
                'title'       => 'Traveling Around Sri Lanka with a Baby – Food Packing Tips',
                'category'    => 'Parenting in Sri Lanka',
                'tags'        => ['travel with baby', '6 months+'],
                'author'      => 'Aromat Parents',
                'date'        => now()->subDays(3),
                'excerpt'     => 'From train rides to beach trips – how we keep baby fed and happy.',
                'content'     => '<p>Pack our ready pouches, small cereal boxes, date powder for sweetness, and a thermos. Works great for Ella trains or Tangalle beach days!</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],

            // 6
            [
                'title'       => 'Kurakkan Power: Why We Love This Ancient Sri Lankan Supergrain',
                'category'    => 'Baby Nutrition Tips',
                'tags'        => ['kurakkan', 'iron rich foods', 'organic'],
                'author'      => 'Aromat Nutrition Team',
                'date'        => now()->subDays(14),
                'excerpt'     => 'Ragi / kurakkan – calcium, iron, and fibre in one humble grain.',
                'content'     => '<p>Our grandparents knew it well. High in natural calcium and iron, gluten-free, and perfect for porridge or mixing into our baby cereals.</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],

            // 7
            [
                'title'       => 'Simple Homemade Papaya & Banana Puree – 6 Month Starter',
                'category'    => 'Homemade Baby Food',
                'tags'        => ['6 months+', 'weaning', 'natural sweetness'],
                'author'      => 'Aromat Kitchen',
                'date'        => now()->subDays(8),
                'excerpt'     => 'No cooking needed – just two local fruits for a nutrient-packed first meal.',
                'content'     => '<p>Mash ripe papaya and banana together. Add breastmilk/formula for smoother texture. Rich in vitamins A & C – gentle on tiny tummies.</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],

            // 8
            [
                'title'       => 'Building Strong Immunity with Everyday Sri Lankan Foods',
                'category'    => 'Baby Development & Health',
                'tags'        => ['immunity booster', 'baby health', 'Sri Lankan ingredients'],
                'author'      => 'Aromat Nutrition Team',
                'date'        => now()->subDays(2),
                'excerpt'     => 'Support your baby’s defences naturally – no fancy supplements needed.',
                'content'     => '<p>Include turmeric in mild curry mixes, honey/date powder for natural energy, and yogurt for probiotics. Our baby curry mixes are gentle and immunity-friendly.</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],

            // 9
            [
                'title'       => 'Our Baby Yogurt – Natural, No Added Sugar, Made for Sri Lanka',
                'category'    => 'Product Spotlights',
                'tags'        => ['baby yogurt', 'no added sugar', 'natural sweetness'],
                'author'      => 'Aromat Team',
                'date'        => now(),
                'excerpt'     => 'Creamy, probiotic-rich yogurt perfect as a first dessert or snack.',
                'content'     => '<p>Made with real milk and fruit purees – no artificial flavours. Great mixed with our date powder for natural sweetness Sri Lankan babies love.</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],

            // 10
            [
                'title'       => 'Puffs & Snacks: Making Self-Feeding Fun and Nutritious',
                'category'    => 'Product Spotlights',
                'tags'        => ['puffs & biscuits', 'finger foods', '6 months+'],
                'author'      => 'Aromat Parents',
                'date'        => now()->subDays(4),
                'excerpt'     => 'Messy but magical – the stage every parent looks forward to.',
                'content'     => '<p>Our puffs dissolve quickly, reducing choking risk, and are made with whole grains. Ideal for on-the-go or playtime learning.</p>',
                'image'       => 'assets/images/blog/631322687-H.webp',
            ],
        ];

        foreach ($blogs as $data) {
            $category = $categoryModels[$data['category']];

            $blog = Blog::create([
                'title'             => $data['title'],
                'slug'              => Str::slug($data['title']),
                'meta_title'        => $data['title'] . ' | Aromat Baby Food Sri Lanka',
                'meta_description'  => $data['excerpt'] . ' Trusted nutrition from a Sri Lankan family brand.',
                'meta_keywords'     => implode(', ', $data['tags']) . ', baby food Sri Lanka, Aromat',
                'blog_category_id'  => $category->id,
                'author_name'       => $data['author'],
                'published_at'      => $data['date'],
                'description'       => $data['content'],
                'image_path'        => $data['image'],
                'is_active'         => true,
            ]);

            // Attach tags
            $tagIds = collect($data['tags'])->map(fn($name) => $tagModels[$name]->id ?? null)->filter();
            $blog->tags()->attach($tagIds);
        }

        $this->command->info('Aromat blog – 10 demo posts seeded successfully!');
    }
}