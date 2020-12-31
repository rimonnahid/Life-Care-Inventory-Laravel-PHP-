<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->unsignedBigInteger('supplier_id')->nullable();
            // $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('name');
            $table->string('pv')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('details')->nullable();
            // $table->string('garage')->nullable();
            $table->string('size')->nullable();
            $table->string('buy_price');
            $table->string('selling_price');
            $table->unique(['name','size']);
            // $table->string('buy_date')->nullable();
            // $table->string('expire_date')->nullable();
            // $table->string('photo_1');
            // $table->string('photo_2')->nullable();
            // $table->string('photo_3')->nullable();
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
        Schema::dropIfExists('products');
    }
}
