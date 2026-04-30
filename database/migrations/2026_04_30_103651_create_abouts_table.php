<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title');
            $table->text('hero_description');
            $table->text('about_text');
            $table->string('about_image');
            $table->string('footprint_regions');
            $table->text('solutions_text');
            $table->string('core_values_subtitle');
            $table->string('vision_image');
            $table->text('vision_text');
            $table->string('vision_tag_1');
            $table->string('vision_tag_2');
            $table->string('vision_tag_3');
            $table->string('core_mission_label');
            $table->string('commitment_title');
            $table->text('commitment_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
