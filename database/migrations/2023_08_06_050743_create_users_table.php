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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('mobile', 10)->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->text('address')->nullable(false);
            $table->string('profile')->nullable(false)->default('default.jpg');
            $table->string('status')->nullable(false)->default('Active');
            $table->string('role')->default('0');
            $table->date('created_at')->default(today());
            $table->date('updated_at')->default(today());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
