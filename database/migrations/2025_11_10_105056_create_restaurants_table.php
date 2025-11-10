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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('name')->index();
            $table->string('picture')->nullable();
            $table->text('address');
            $table->foreignUuid('city_uuid')->constrained('cities', 'uuid')->onDelete('cascade');
            $table->date('opened_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
