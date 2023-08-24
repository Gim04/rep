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
        Schema::create('joysticks', function (Blueprint $table) {
            $table->id();
            $table->boolean('bool_position');
            $table->foreignId('position_id');
            $table->foreignId('manufacturer_id');
            $table->string('inventory_number');
            $table->string('serial_number');
            $table->integer('year');
            $table->string('model');
            $table->boolean('box');
            $table->text('description');
            $table->string('icon');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joysticks');
    }
};
