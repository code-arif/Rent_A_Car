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
        Schema::create('car_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->string('short_description');
            $table->text('description')->nullable();
            $table->integer('seats');
            $table->enum('fuel_type',['Petrol', 'Diesel', 'CNG', 'Electric'])->default('CNG');
            $table->decimal('mileage', 8, 2)->nullable();
            $table->enum('transmission',['Manual', 'Automatic'])->default('Manual');
            $table->boolean('air_conditioning')->default(true);
            $table->boolean('gps')->default(false);
            $table->boolean('bluetooth')->default(false);
            $table->boolean('usb_port')->default(false);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_details');
    }
};
