<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->truncate();

        $services = [
            [
                'title'            => 'Satellite TV Installation Setup',
                'description'      => '<p>Professional <strong>satellite dish installation</strong> for homes and businesses. We handle everything from site survey and dish alignment to full receiver setup, ensuring you get the best signal strength and crystal-clear picture quality.</p><ul><li>Free signal strength test</li><li>Multi-room setup available</li><li>Compatible with all major satellite providers</li></ul>',
                'meta_title'       => 'Satellite TV Installation Services – Ukaaye',
                'meta_description' => 'Expert satellite dish installation for homes and businesses. Crystal-clear signal, multi-room setup, compatible with all major satellite providers.',
                'meta_keyword'     => 'satellite TV installation, dish installation, satellite setup, Ukaaye satellite',
            ],
            [
                'title'            => 'Network Infrastructure Setup',
                'description'      => '<p>End-to-end <strong>network infrastructure design and installation</strong> for offices, warehouses, and large premises. From structured cabling and switch configuration to Wi-Fi access point deployment, we build networks that are fast, reliable, and scalable.</p><ul><li>Structured Cat6 / Fiber cabling</li><li>Managed & unmanaged switch setup</li><li>Wireless access point planning &amp; installation</li><li>Network rack assembly</li></ul>',
                'meta_title'       => 'Network Infrastructure Setup – Ukaaye',
                'meta_description' => 'Professional network cabling, switch configuration, and Wi-Fi deployment for offices and businesses. Fast, reliable, and scalable solutions by Ukaaye.',
                'meta_keyword'     => 'network infrastructure, structured cabling, LAN setup, office network, Ukaaye networking',
            ],
            [
                'title'            => 'CCTV & Security Camera Installation',
                'description'      => '<p>Keep your property secure with our <strong>professional CCTV installation service</strong>. We supply and install high-definition IP and analog cameras with remote viewing capability so you can monitor your premises from anywhere.</p><ul><li>HD &amp; 4K camera options</li><li>Night vision &amp; motion detection</li><li>Remote mobile viewing setup</li><li>NVR / DVR configuration</li></ul>',
                'meta_title'       => 'CCTV & Security Camera Installation – Ukaaye',
                'meta_description' => 'HD CCTV and security camera installation for homes and businesses. Remote viewing, night vision, and motion detection. Trusted by Ukaaye.',
                'meta_keyword'     => 'CCTV installation, security camera, IP camera, DVR NVR setup, Ukaaye CCTV',
            ],
            [
                'title'            => 'Internet & Broadband Solutions',
                'description'      => '<p>We help you choose, install, and configure the best <strong>broadband and internet connection</strong> for your needs — whether fiber optic, fixed wireless, or satellite internet. Our team ensures maximum speeds and stable uptime for both residential and commercial clients.</p><ul><li>Fiber optic connection setup</li><li>Router &amp; modem configuration</li><li>Fixed wireless installation</li><li>Bandwidth management &amp; QoS setup</li></ul>',
                'meta_title'       => 'Internet & Broadband Solutions – Ukaaye',
                'meta_description' => 'Fast and reliable internet setup for homes and businesses. Fiber, wireless, and satellite broadband solutions by Ukaaye.',
                'meta_keyword'     => 'broadband installation, fiber optic, internet setup, router configuration, Ukaaye internet',
            ],
            [
                'title'            => 'Electronic Device Repair & Maintenance',
                'description'      => '<p>Our certified technicians provide <strong>repair and maintenance services</strong> for a wide range of electronic devices including satellite receivers, routers, switches, modems, and network equipment. We offer both on-site and bring-in repair options.</p><ul><li>Satellite receiver repair</li><li>Router &amp; modem troubleshooting</li><li>Network switch servicing</li><li>Preventive maintenance contracts available</li></ul>',
                'meta_title'       => 'Electronic Device Repair & Maintenance – Ukaaye',
                'meta_description' => 'Certified repair and maintenance for satellite receivers, routers, modems, and network equipment. On-site and in-house service by Ukaaye.',
                'meta_keyword'     => 'electronic repair, satellite receiver repair, router repair, network maintenance, Ukaaye repair',
            ],
            [
                'title'            => 'Signal & Connectivity Troubleshooting',
                'description'      => '<p>Experiencing weak signals, dropouts, or connectivity issues? Our experts perform <strong>in-depth signal diagnostics</strong> and connectivity troubleshooting to identify and fix problems quickly — minimising your downtime.</p><ul><li>Satellite signal alignment &amp; optimisation</li><li>Wi-Fi dead zone analysis</li><li>Network fault detection &amp; repair</li><li>On-site &amp; remote support available</li></ul>',
                'meta_title'       => 'Signal & Connectivity Troubleshooting – Ukaaye',
                'meta_description' => 'Expert signal diagnostics and network troubleshooting. Fix weak signals, dropouts, and connectivity issues fast. Ukaaye on-site and remote support.',
                'meta_keyword'     => 'signal troubleshooting, connectivity issues, Wi-Fi fix, satellite signal, Ukaaye support',
            ],
        ];

        foreach ($services as $data) {
            Service::create([
                'title'            => $data['title'],
                'slug'             => Str::slug($data['title']),
                'description'      => $data['description'],
                'image_path'       => 'assets/img/services/pexels-tima-miroshnichenko-6755135.jpg',
                'meta_title'       => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keyword'     => $data['meta_keyword'],
                'is_public'        => true,
            ]);
        }
    }
}
