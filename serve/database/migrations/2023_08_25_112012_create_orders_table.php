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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->decimal('delivery_value', 8, 2);
            $table->string('payment_method')->nullable();
            $table->decimal('change_cash', 8, 2)->default(0);
            $table->decimal('total_payable')->default(0);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shopping_bag_id');
            $table->unsignedBigInteger('address_id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('shopping_bag_id')->references('id')->on('shopping_bag');
            $table->foreign('address_id')->references('id')->on('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
