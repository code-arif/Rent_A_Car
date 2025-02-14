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
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->enum('car_type', ['SUV', 'Sedan', 'Hatchback', 'Truck']);
            $table->decimal('daily_rent_price', 10, 2);
            $table->decimal('weekly_rent_price', 10, 2)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->enum('availability', ['Available', 'Not Available']);
            $table->string('image')->nullable();
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
