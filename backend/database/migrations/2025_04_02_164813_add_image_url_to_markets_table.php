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
        Schema::table('markets', function (Blueprint $table) {
            // Check if column doesn't exist before adding (prevent errors)
            if (!Schema::hasColumn('markets', 'image_url')) {
                $table->string('image_url')
                    ->nullable()
                    ->after('status');  // Changed from 'description' to 'status' to match your initial schema
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('markets', function (Blueprint $table) {
            // Safely drop the column if it exists
            if (Schema::hasColumn('markets', 'image_url')) {
                $table->dropColumn('image_url');
            }
        });
    }
};