<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slide;

class SlideSeeder extends Seeder {
    public function run(): void {
        $slides = [
            ['label' => 'PRECISION ENGINEERING', 'heading' => 'Crystalline<br>Mobility.',       'text' => 'We deliver comprehensive end-to-end technology solutions and tailored services within the IT and Telecommunication sectors.', 'image' => 'assets/Hero Slider 1.png', 'sort_order' => 1],
            ['label' => 'ADVANCED TECHNOLOGY',   'heading' => 'Innovative<br>Infrastructure.', 'text' => 'Providing cutting-edge server and storage solutions to power your enterprise growth and digital efficiency.',                'image' => 'assets/hero_slider_2.png', 'sort_order' => 2],
            ['label' => 'GLOBAL REACH',          'heading' => 'Connected<br>Solutions.',       'text' => 'Our expansive distribution network ensures your technology needs are met with speed and reliability across the globe.',       'image' => 'assets/hero_slider_3.png', 'sort_order' => 3],
        ];

        foreach ($slides as $slide) {
            Slide::create($slide);
        }
    }
}