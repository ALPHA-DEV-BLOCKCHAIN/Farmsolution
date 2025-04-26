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
        Schema::table('weather', function (Blueprint $table) {
            // Add the image_url column to the weather table
            $table->string('image_url')->nullable(); // Add nullable image_url column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weather', function (Blueprint $table) {
            // Drop the image_url column if the migration is rolled back
            $table->dropColumn('image_url');
        });
    }
};
