<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('is_service')->default(0);
            $table->double('price_sale')->nullable();
            $table->double('price_purchase')->nullable();
            $table->string('currency')->nullable();
            $table->string('tax')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('vendor_id')->nullable()->references('id')->on('vendors');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories');
            $table->foreignId('unit_id')->nullable()->references('id')->on('units');
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
        Schema::dropIfExists('items');
    }
}
