<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        // ── Clean existing data ───────────────────────────────────────────────
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('testimonials')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // ── Testimonials ──────────────────────────────────────────────────────
        $items = [
            [
                'name'       => 'Kavindu Rajapaksha',
                'position'   => 'Home Installation Technician',
                'message'    => 'Ukaye delivered my satellite dish and receiver the same day. Top quality products and island-wide delivery is a game changer!',
                'star_count' => 5,
            ],
            [
                'name'       => 'Prasad Wijesinghe',
                'position'   => 'Network Engineer, Colombo',
                'message'    => 'Best place to source optical fiber cables and networking gear in Sri Lanka. Reliable stock and expert support every time.',
                'star_count' => 5,
            ],
            [
                'name'       => 'Chaminda Perera',
                'position'   => 'CATV Technician, Kandy',
                'message'    => 'Ukaye is my go-to supplier for signal amplifiers and splitters. Trusted quality and the prices are unbeatable nationwide.',
                'star_count' => 5,
            ],
            [
                'name'       => 'Roshan Fernando',
                'position'   => 'Business Owner, Galle',
                'message'    => 'We installed a full satellite distribution system using Ukaye products. Seamless connectivity and excellent after-sales support!',
                'star_count' => 4,
            ],
            [
                'name'       => 'Nuwan Dissanayake',
                'position'   => 'IT Contractor, Negombo',
                'message'    => 'From digital receivers to fiber equipment — Ukaye has everything. Fast delivery and the team really knows their products.',
                'star_count' => 5,
            ],
            [
                'name'       => 'Tharaka Senanayake',
                'position'   => 'Home User, Matara',
                'message'    => 'Ordered a digital receiver and signal booster online — arrived quickly and works perfectly. Truly powering connectivity across Sri Lanka!',
                'star_count' => 5,
            ],
            [
                'name'       => 'Isuru Bandara',
                'position'   => 'Satellite Installer, Kurunegala',
                'message'    => 'I have been sourcing LNBFs and multiswitches from Ukaye for years. Never had a quality issue — highly recommended for technicians!',
                'star_count' => 5,
            ],
            [
                'name'       => 'Malith Jayawardena',
                'position'   => 'Hotel IT Manager, Colombo',
                'message'    => 'Ukaye supplied our entire hotel satellite distribution system. Professional products, great pricing, and reliable island-wide delivery.',
                'star_count' => 5,
            ],
            [
                'name'       => 'Sachini Madushani',
                'position'   => 'Home User, Ratnapura',
                'message'    => 'The indoor TV antenna I bought from Ukaye works perfectly. Crystal clear HD signal and very affordable. Will definitely order again!',
                'star_count' => 4,
            ],
            [
                'name'       => 'Asanka Gunaratne',
                'position'   => 'Telecom Technician, Anuradhapura',
                'message'    => 'Ukaye is the most trusted supplier for fiber optic and CATV equipment in Sri Lanka. Fast shipping and genuine products always.',
                'star_count' => 5,
            ],
            [
                'name'       => 'Dinesh Kumara',
                'position'   => 'Electrical Contractor, Badulla',
                'message'    => 'Ordered signal amplifiers and splitters for a large apartment project. Ukaye delivered on time with full technical support. Outstanding service!',
                'star_count' => 5,
            ],
            [
                'name'       => 'Harsha Pathirana',
                'position'   => 'Small Business Owner, Jaffna',
                'message'    => 'Running a satellite shop in Jaffna and Ukaye is my main wholesale supplier. Best prices, genuine brands, and fast island-wide delivery.',
                'star_count' => 5,
            ],
        ];

        foreach ($items as $item) {
            Testimonial::create([
                'name'       => $item['name'],
                'position'   => $item['position'],
                'message'    => $item['message'],
                'image_path' => '\\assets\\img\\testimoials\\456453476.jpg',
                'is_active'  => true,
                'star_count' => $item['star_count'],
            ]);
        }

        $this->command->info('Testimonials seeded successfully!');
    }
}