<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsPage;
class ProductsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      ProductsPage::create([
    'hero_label'       => 'ENGINEERED FOR EXCELLENCE',
    'hero_title'       => 'The New Standard of Performance',
    'hero_description' => 'Every component is meticulously calibrated. Every curve is precision-milled. Experience the tactile peak of modern computing.',
    'section_title'    => 'Our Products',
    'section_subtitle' => 'A CURATED ECOSYSTEM OF COMPUTATIONAL INSTRUMENTS DESIGNED FOR ABSOLUTE PERFORMANCE AND TACTILE PERMANENCE.',
]);
    }
}
