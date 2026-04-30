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
        Schema::create('products_pages', function (Blueprint $table) {
            $table->id();
            $table->string('hero_label')->default('ENGINEERED FOR EXCELLENCE');
            $table->string('hero_title')->default('The New Standard of Performance');
            $table->text('hero_description');
            $table->string('section_title')->default('Our Products');
             $table->text('section_subtitle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_pages');
    }
};
