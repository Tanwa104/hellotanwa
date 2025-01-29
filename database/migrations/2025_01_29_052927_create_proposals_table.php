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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
 
    $table->foreign('user_id')->references('id')->on('users');
    $table->unsignedBigInteger('helper_id');
 
    $table->foreign('helper_id')->references('id')->on('helpers');
    $table->unsignedBigInteger('useradd_id');
 
    $table->foreign('useradd_id')->references('id')->on('user_address');
            $table->bigInteger('price');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
