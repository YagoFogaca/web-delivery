<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('endereco_store', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stores_id')->nullable();
            $table->string('cep');
            $table->string('estado');
            $table->string('cidade');
            $table->string('rua');
            $table->string('numero');
            $table->string('complemento');
            $table->foreign('stores_id')->references('id')->on('stores');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('endereco_store');
    }
};
