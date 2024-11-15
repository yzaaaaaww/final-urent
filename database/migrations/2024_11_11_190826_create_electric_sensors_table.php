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
        Schema::create('electric_sensors', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->default(2);
            $table->decimal('volts_amperes', 10, 2);
            $table->decimal('watts_hours', 10, 2);
            $table->decimal('consumption')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electric_sensors');
    }
};
