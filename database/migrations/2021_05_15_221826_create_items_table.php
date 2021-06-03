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
            $table->string('barcode')->nullable();
            $table->tinyInteger('is_service')->default(0);
            $table->string('currency')->nullable();
            $table->foreignId('tax_id')->nullable()->constrained('taxes');
            $table->string('image')->nullable();
            $table->foreignId('vendor_id')->nullable()->references('id')->on('vendors');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories');
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
