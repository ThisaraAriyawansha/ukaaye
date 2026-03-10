<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name' => 'Outdoor & Gaming',      'category_name' => 'Events'],
            ['name' => 'Classroom Activities',  'category_name' => 'Events'],
            ['name' => 'Art & Craft',           'category_name' => 'Events'],
            ['name' => 'Sports Day',            'category_name' => 'Events'],
            ['name' => 'Annual Concert',        'category_name' => 'Events'],
        ];

        foreach ($items as $item) {
            Gallery::firstOrCreate(
                ['name' => $item['name']],
                [
                    'category_name' => $item['category_name'],
                    'image_path'    => 'assets/images/gallery/563543.jpg',
                    'is_active'     => true,
                ]
            );
        }

        $this->command->info('Gallery seeded successfully!');
    }
}
