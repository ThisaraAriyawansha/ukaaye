<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name'       => 'Nadeesha Perera',
                'position'   => 'Mother of 8-month old',
                'message'    => 'My baby loves Aromat Brown Rice Cereal — no sugar, no preservatives, 100% trust!',
                'star_count' => 5,
            ],
            [
                'name'       => 'Chamara Silva',
                'position'   => 'Father of 1-year old',
                'message'    => 'Fruit purees are perfect — no mess, affordable, and made in Sri Lanka. My son finishes every spoon!',
                'star_count' => 5,
            ],
            [
                'name'       => 'Dilini Fernando',
                'position'   => 'Mother of 6-month old',
                'message'    => 'Aromat Oatmeal & Ragi Cereal made starting solids so easy — gentle and budget-friendly!',
                'star_count' => 5,
            ],
            [
                'name'       => 'Ruwan Jayasuriya',
                'position'   => 'Father of 9-month old',
                'message'    => 'Aromat Puffs are our go-to snack — no additives, great taste, perfect price!',
                'star_count' => 4,
            ],
            [
                'name'       => 'Tharindu Perera',
                'position'   => 'Father of 10-month old',
                'message'    => 'Blueberry yogurt is a favourite — natural probiotics and my son asks for more!',
                'star_count' => 5,
            ],
            [
                'name'       => 'Sachini Weerasinghe',
                'position'   => 'Mother of 7-month old',
                'message'    => 'Dates Powder is genius — natural sweetness, safe, and much cheaper than imports!',
                'star_count' => 5,
            ],
        ];

        foreach ($items as $item) {
            Testimonial::firstOrCreate(
                ['name' => $item['name']],
                [
                    'position'   => $item['position'],
                    'message'    => $item['message'],
                    'image_path' => null,
                    'is_active'  => true,
                    'star_count' => $item['star_count'],
                ]
            );
        }

        $this->command->info('Testimonials seeded successfully!');
    }
}
