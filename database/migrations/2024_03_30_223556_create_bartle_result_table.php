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
        Schema::create('bartle_results', function (Blueprint $table) {
            $table->id();
            $table->float('achiever');
            $table->float('explorer');
            $table->float('killer');
            $table->float('socializer');
            $table->foreignId('answer_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bartle_result');
    }
};
