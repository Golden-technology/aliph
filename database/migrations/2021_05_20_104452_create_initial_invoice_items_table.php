<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initial_invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('initial_invoice_id')->constrained('initial_invoices');
            // $table->foreignId('item_store_id')->constrained('item_stores');
            $table->foreignId('item_id')->constrained('items');
            $table->foreignId('unit_id')->constrained('units');
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->double('total')->nullable();
            $table->integer('tax')->nullable();
            $table->double('discount')->nullable();
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
        Schema::dropIfExists('initial_invoice_items');
    }
}
