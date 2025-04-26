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
        Schema::create('weather', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('farm_id')->constrained()->onDelete('cascade'); // Link to the farm
            $table->decimal('temperature', 5, 2); // Temperature in Celsius
            $table->decimal('rainfall', 5, 2); // Rainfall in mm
            $table->string('forecast')->nullable(); // Weather forecast (optional)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};