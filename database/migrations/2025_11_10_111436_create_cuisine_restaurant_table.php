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
        Schema::create('cuisine_restaurant', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignUuid('cuisine_uuid')->constrained('cuisines', 'uuid')->onDelete('cascade');
            $table->foreignUuid('restaurant_uuid')->constrained('restaurants', 'uuid')->onDelete('cascade');
            $table->unique(['cuisine_uuid', 'restaurant_uuid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuisine_restaurant');
    }
};
