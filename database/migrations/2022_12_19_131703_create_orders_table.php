<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('productID');
            $table->timestamp('orderTime')->nullable();
            $table->string('orderTotal');
            $table->timestamp('paymentTime')->nullable();
            $table->string('payment_type');
            $table->string('payment_method');
            $table->string('transaction_id');
            $table->string('currency');
            $table->float('amount',8,2);
            $table->string('order_number');
            $table->string('invoice_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
