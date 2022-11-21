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
        Schema::create('saleproducts', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->integer('saleid');
            $table->integer('quantities');
            $table->integer('create_by');
            $table->integer('price_id');
            $table->integer('tax_id');
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
        Schema::dropIfExists('saleproducts');
    }
};
