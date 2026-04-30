<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder {
    public function run(): void {
        $products = [
            ['name' => "Desktops & AIO's", 'sub_title' => 'UNIFIED COMPUTING',          'action_text' => 'CONFIGURE RIG', 'image' => 'assets/Desktop_card.png',         'is_special' => true,  'sort_order' => 1],
            ['name' => 'Laptops',           'sub_title' => 'PORTABLE POWERHOUSE',        'action_text' => 'EXPLORE SPECS', 'image' => 'assets/Laptop_Card.png',          'is_special' => false, 'sort_order' => 2],
            ['name' => 'Monitors',          'sub_title' => 'CHROMATOGRAPHIC EXCELLENCE', 'action_text' => 'VIEW PANELS',   'image' => 'assets/Monitor_card.png',         'is_special' => false, 'sort_order' => 3],
            ['name' => 'Docking Station',   'sub_title' => 'INTEGRATED CONNECTIVITY',    'action_text' => 'VIEW HUB',      'image' => 'assets/Docking_station_Card.png', 'is_special' => false, 'sort_order' => 4],
            ['name' => 'Components',        'sub_title' => 'SSD, HDD & DRAM',            'action_text' => 'CORE SPECS',    'image' => 'assets/Components_card.png',      'is_special' => false, 'sort_order' => 5],
            ['name' => 'Workstation',       'sub_title' => 'HEAVYWEIGHT COMPUTING',      'action_text' => 'CONFIGURE RIG', 'image' => 'assets/Workstation_card.png',     'is_special' => false, 'sort_order' => 6],
            ['name' => 'Audio/Video Products', 'sub_title' => 'SENSORY FIDELITY',        'action_text' => 'EXPLORE MEDIA', 'image' => 'assets/Audio&video_card.png',     'is_special' => false, 'sort_order' => 7],
            ['name' => 'Servers & Storage', 'sub_title' => 'ENTERPRISE INFRASTRUCTURE',  'action_text' => 'DEPLOY SCALE',  'image' => 'assets/Server&Storage_Card.png',  'is_special' => false, 'sort_order' => 8],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}