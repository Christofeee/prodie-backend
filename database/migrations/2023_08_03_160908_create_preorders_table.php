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
        Schema::create('preorders', function (Blueprint $table) {
            $table->id();
            $table->string('nrc')->unique();
            $table->string('name');
            $table->integer('phone');
            $table->integer('secondary_phone')->nullable();
            $table->string('email');
            $table->string('address');
            $table->float('latitude');
            $table->float('longitude');
            // $table->unsignedBigInteger('product_id');
            $table->timestamps();
            $table->foreignId('product_id')->constrained('products');
            //$table->foreign('product_id')->references('id')->on('products');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preorders');
    }
};
