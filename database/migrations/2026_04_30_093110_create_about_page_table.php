<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_title');
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description');

            // About Section
            $table->text('about_text');
            $table->string('about_image')->nullable();
            $table->string('footprint_regions')->nullable();

            // Solutions Section
            $table->text('solutions_text')->nullable();

            // Vision Section
            $table->text('vision_text')->nullable();
            $table->string('vision_image')->nullable();

            // Commitment Section
            $table->string('commitment_title')->nullable();
            $table->text('commitment_text')->nullable();

            // Core Values Section
            $table->string('core_values_subtitle')->default('A technical heritage built on the relentless pursuit of hardware excellence and calibrated precision.');

            // Vision Tags
            $table->string('vision_tag_1')->default('PRECISION');
            $table->string('vision_tag_2')->default('AUTHORITY');
            $table->string('vision_tag_3')->default('LONGEVITY');

            // Commitment Section Label
            $table->string('core_mission_label')->default('THE CORE MISSION');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};