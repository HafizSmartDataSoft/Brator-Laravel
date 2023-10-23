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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('sku')->unique();
            $table->text('description');
            $table->smallInteger('base_price');
            $table->smallInteger('sale_price');
            $table->smallInteger('cost_price');
            $table->smallInteger('tax');
            $table->smallInteger('quantity');
            $table->smallInteger('alert_threshold');
            $table->smallInteger('status');
            $table->smallInteger('parent_category');
            // $table->smallInteger('sub_category');
            // $table->string('tag');
            $table->smallInteger('make_id');
            $table->smallInteger('year_id');
            $table->smallInteger('model_id');
            $table->string('featured_image')->nullable();
            // $table->string('gallary_images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
