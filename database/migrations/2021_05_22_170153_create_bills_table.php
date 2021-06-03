<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->nullable()->constrained('vendors');
            $table->foreignId('store_id')->nullable()->constrained('stores');
            $table->string('status')->nullable();
            $table->string('currency')->nullable();
            $table->double('total')->nullable();
            $table->text('vendor_condition')->nullable();
            $table->text('condition')->nullable();
            $table->string('tax')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
