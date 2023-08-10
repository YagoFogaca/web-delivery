<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     */

    public function up(): void
    {
        Schema::create('open_hours', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->time('start_time')->default('18:45');
            $table->time('end_time')->default('23:00');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_hours');
    }
};
