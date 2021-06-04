<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained('customers');
            $table->foreignId('vendor_id')->nullable()->constrained('vendors');
            $table->foreignId('payment_method')->nullable()->constrained('payment_methods');
            $table->string('number')->nullable();
            $table->string('reference')->nullable();
            $table->string('amount')->nullable();
            $table->string('received_amount')->nullable();
            $table->string('bank')->nullable();
            $table->text('details')->nullable();
            $table->text('comments')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
