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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string("Service_name")->unique()->nullable(false); 
            $table->string("Service_price")->nullable(false); 
            $table->string("Service_includes")->nullable(false);
            $table->string("Service_status")->nullable(false); 
            $table->string("Service_image")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
