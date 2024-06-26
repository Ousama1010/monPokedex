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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('hp');
            $table->float('weight');
            $table->float('height');
            $table->string('img_path');
            $table->unsignedBigInteger('primary_type_id');
            $table->unsignedBigInteger('secondary_type_id')->nullable();
            $table->foreign('primary_type_id')->references('id')->on('types');
            $table->foreign('secondary_type_id')->references('id')->on('types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
