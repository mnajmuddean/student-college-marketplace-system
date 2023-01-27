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
        
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unSignedBigInteger('productID')->unsigned();
            $table->unSignedBigInteger('userID')->unsigned();
            $table->string('feedbackMessage');
            $table->timestamp('feedbackTime')->nullable();
            $table->foreign('productID')
                    ->references('productID')->on('products');
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
        Schema::dropIfExists('feedbacks');
    }
};
