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
        Schema::create('terminals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id');
            $table->foreignId('manufacturer_id');
            $table->Boolean('position');
            $table->string('inventory_number');
            $table->string('serial_number');
            $table->string('model');
            $table->string('submodel');
            $table->date('year');
            $table->string('power_type');
            $table->string('power_rating');
            $table->boolean('monitor');
            $table->boolean('box');
            $table->text('description')->nullable(); 
            $table->string('icon');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminals');
    }
};
