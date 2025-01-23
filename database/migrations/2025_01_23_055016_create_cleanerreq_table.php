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
        Schema::create('cleanerreq', function (Blueprint $table) {
            $table->id();

            $table->string('hometype');
            $table->BigInteger('bedroomno');
            $table->BigInteger('hallno');
            $table->BigInteger('kichenno');
            $table->string('cleaningtype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cleanerreq');
    }
};
