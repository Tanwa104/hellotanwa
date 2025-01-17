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
        Schema::table('helpers', function (Blueprint $table) {
            $table->unsignedBigInteger('timeline_id')->after('user_id');
 
            $table->foreign('timeline_id')->references('id')->on('timelines');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('helpers', function (Blueprint $table) {
            $table->dropColumn('timeline_id');
        });
    }
};
