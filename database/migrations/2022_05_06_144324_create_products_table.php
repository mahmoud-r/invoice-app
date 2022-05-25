<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->decimal('price');
            $table->integer('Quantity');
            $table->foreignId('categorie_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
};
