<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutPage;
use App\Models\CoreValue;

class AboutPageSeeder extends Seeder
{
    public function run()
    {
        AboutPage::create([
            'hero_title'        => 'The Precision of Performance.',
            'hero_subtitle'     => 'Engineering Excellence', // ✅ ADD THIS (IMPORTANT)
            'hero_description'  => 'Engineering digital instruments with the tactile permanence of bespoke hardware. We define the intersection of technical mastery and artisanal craft.',
            'about_text'        => 'TrueNorth IT Distribution F.Z.C stands as a premier Information & Communication Technology distributor, guided by seasoned industry leaders with profound expertise in regional markets.',
            'about_image'       => 'assets/about_image.png',
            'footprint_regions' => 'UAE, GCC, Africa, CIS, Asia',
            'solutions_text'    => 'We deliver comprehensive end-to-end technology solutions and tailored services within the IT and Telecommunication sectors.',
            'vision_text'       => 'To build and become a trusted and influential IT distribution partner across emerging markets, driven by integrity, transparency, and passion.',
            'vision_image'      => 'assets/Our_Vision.png',
            'commitment_title'  => 'Our Commitment',
            'commitment_text'   => 'We prioritize excellence by supplying high-quality products and services designed to fulfil the varied requirements of our valued clients.',
        ]);

        $values = [
            [
                'icon' => 'fas fa-certificate',
                'title' => 'Integrity',
                'description' => 'We operate with honesty and ethical standards in every transaction, building trust through transparent practices that prioritize long-term relationships over short-term gains.',
                'card_type' => 'light-card',
                'sort_order' => 1
            ],
            [
                'icon' => 'fas fa-handshake',
                'title' => 'Partnership',
                'description' => 'We foster collaborative and strong relationships with vendors, partners, and customers, driving sustainable growth and shared success.',
                'card_type' => 'gold-card',
                'sort_order' => 2
            ],
            [
                'icon' => 'far fa-heart',
                'title' => 'Passion',
                'description' => 'Our team approaches every challenge with enthusiasm and dedication, fuelling creativity and adaptability in the fast-evolving IT and telecom landscape.',
                'card_type' => 'gold-card',
                'sort_order' => 3
            ],
            [
                'icon' => 'fas fa-bullseye',
                'title' => 'Customer Focus',
                'description' => 'Placing customers diverse needs at the heart of everything we do, we deliver tailored end-to-end solutions by anticipating market demands and exceeding expectations.',
                'card_type' => 'light-card',
                'sort_order' => 4
            ],
        ];

        foreach ($values as $value) {
            CoreValue::create($value);
        }
    }
}