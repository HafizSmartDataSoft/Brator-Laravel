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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_title');
            $table->string('coupon_code')->unique();
            $table->string('discount');
            $table->string('coupon_type');
            $table->string('start_date');
            $table->string('expiration_date');
            $table->string('minimum_amount')->nullable();
            $table->string('max_uses')->nullable();
            $table->tinyInteger('once_check')->default(0);
            $table->string('discount_on');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
