<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unique()->nullable(false);
            $table->string('user_email')->nullable(false);
            $table->string('product_name')->nullable(false);
            $table->string('product_price')->nullable(false);
            $table->string('product_categories')->nullable(false);
            $table->string('product_quantity')->nullable(false);
            $table->string('product_imgs')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};