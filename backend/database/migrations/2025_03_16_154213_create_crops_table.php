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
        Schema::create('crops', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('farm_id')->constrained()->onDelete('cascade'); // Link to the farm
            $table->string('type'); // e.g., maize, wheat, coffee
            $table->date('planting_date'); // Date when the crop was planted
            $table->date('harvest_date')->nullable(); // Date when the crop is expected to be harvested (nullable)
            $table->decimal('expected_yield', 8, 2)->nullable(); // Expected yield in tons (nullable)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};