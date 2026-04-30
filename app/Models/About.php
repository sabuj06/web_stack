<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'hero_title', 'hero_description', 'about_text', 'about_image',
        'footprint_regions', 'solutions_text', 'core_values_subtitle',
        'vision_image', 'vision_text', 'vision_tag_1', 'vision_tag_2',
        'vision_tag_3', 'core_mission_label', 'commitment_title', 'commitment_text'
    ];
}
