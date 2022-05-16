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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoices_number',20)->unique();
            $table->date('invoices_date');
            $table->foreignId('categorie_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->decimal('price',8,2);
            $table->decimal('disconunt',8,2)->nullable();
            $table->decimal('after_disconunt',8,2)->nullable();
            $table->string('text_rate',8,2)->nullable();
            $table->decimal('text_value',8,2)->nullable();
            $table->float('total',8,2);
            $table->integer('status')->default(1);
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
