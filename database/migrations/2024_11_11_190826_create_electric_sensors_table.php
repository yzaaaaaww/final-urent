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
            $table->string('tenant_id');
            $table->float('volts_amperes');
            $table->float('watts_hours');
            $table->integer('consumption')->default(0);
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
