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
        Schema::create ('mice', function(Blueprint $table){
            $table->id();	
            $table->foreignId('position_id');
            $table->foreignId('manufacturer_id');
            $table->Boolean('position');
            $table->string('inventory_number');
            $table->string('serial_number');
            $table->string('model');
            $table->date('year');
            $table->boolean('box');
            $table->text('description')->nullable(); 
            $table->string('icon');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mice');
    }
};
