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
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_id');
            $table->string('customer_id');
            $table->string('company_name')->nullable();
            $table->text('note')->nullable();
            $table->string('country');
            $table->string('address');
            $table->string('suburb');
            $table->string('state');
            $table->string('postcode');
            $table->string('phone_number');
            $table->string('mail');
            $table->smallInteger('quantity');
            $table->string('coupons')->nullable();
            $table->string('total_price');
            $table->string('payment_method');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderdetails');
    }
};
