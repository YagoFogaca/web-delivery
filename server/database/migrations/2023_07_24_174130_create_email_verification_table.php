<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('email_verifications', function (Blueprint $table) {
            $table->id();
            $table->integer('id_referencia');
            $table->string('cod');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('email_verification');
    }
};
