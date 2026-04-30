<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = [
        'name', 'sub_title', 'action_text', 'image', 'is_special', 'sort_order'
    ];

    protected $casts = [
        'is_special' => 'boolean',
    ];
}