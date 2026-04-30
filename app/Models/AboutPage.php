<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model {
    protected $table = 'about_page';
    protected $fillable = [
        'hero_title', 'hero_description',
        'about_text', 'about_image', 'footprint_regions',
        'solutions_text',
        'vision_text', 'vision_image',
        'commitment_title', 'commitment_text',
        'core_values_subtitle',
        'vision_tag_1',
        'vision_tag_2',
        'vision_tag_3',
    ];
}