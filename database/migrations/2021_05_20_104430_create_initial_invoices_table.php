<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initial_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->foreignId('vendor_id')->nullable()->constrained('vendors');
            $table->foreignId('store_id')->nullable()->constrained('stores');
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->double('total')->nullable();
            $table->text('customer_condition')->nullable();
            $table->text('condition')->nullable();
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
        Schema::dropIfExists('initial_invoices');
    }
}
