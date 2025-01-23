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
        Schema::table('nannyreq', function (Blueprint $table) {
            $table->string('name');
        $table->integer('age');
        $table->string('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nannyreq', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('age');
            $table->dropColumn('gender');
        });
    }
};
