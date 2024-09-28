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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('CarName');
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->enum('CarType', ['SUV', 'Sedan', 'etc'])->default('Sedan');
            $table->string('daily_rent_price');
            $table->enum('status', ['Available', 'Not Available'])->default('Available');
            $table->string('CarImage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
