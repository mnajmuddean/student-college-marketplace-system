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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brandID');
            $table->integer('categoryID');
            $table->string('productName');
            $table->string('productCode');
            $table->string('productQty');
            $table->string('productTag');
            $table->string('productPrice');
            $table->string('productDiscountPrice')->nullable();
            $table->string('productDescription');
            $table->string('productThumbnail');
            $table->integer('productStatus')->default(0);
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
        Schema::dropIfExists('products');
    }
};
