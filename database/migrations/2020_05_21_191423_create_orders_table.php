<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('pvs_id');
            $table->integer('total_products');
            $table->string('amount');
            $table->string('discount')->nullable();
            $table->string('total')->nullable();
            $table->string('vat')->nullable();
            $table->string('shipping')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('date');
            $table->string('month');
            $table->string('year');
            $table->string('payby')->nullable();
            $table->string('card_number')->nullable();
            $table->string('tracking_code');
            $table->integer('status');
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
        Schema::dropIfExists('orders');
    }
}
