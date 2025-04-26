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
        Schema::create('livestocks', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('farm_id')->constrained()->onDelete('cascade'); // Link to the farm
            $table->string('type'); // e.g., cow, goat, chicken
            $table->string('breed')->nullable(); // Breed of the livestock (optional)
            $table->integer('quantity'); // Number of livestock
            $table->string('health_status')->default('healthy'); // Health status (default: healthy)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livestocks');
    }
};