<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductsPage extends Model
{
    protected $fillable = [
        'hero_label',
        'hero_title',
        'hero_description',
        'section_title',
        'section_subtitle',
    ];
}