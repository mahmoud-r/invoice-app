<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('item_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->references('id')->on('invoices')->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->double('Quantity');
            $table->double('price');
            $table->double('total');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('items_invoices');
    }
};
