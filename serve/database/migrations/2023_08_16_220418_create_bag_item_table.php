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
        Schema::create('bag_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopping_bag_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('amount');
            $table->text('observation')->nullable();
            $table->decimal('price', 10, 2);
            $table->foreign('shopping_bag_id')->references('id')->on('shopping_bag');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bag_item');
    }
};
