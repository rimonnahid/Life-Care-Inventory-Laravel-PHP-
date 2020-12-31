<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cus_id')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('gender');
            $table->string('address');
            // $table->string('shopname')->nullable();
            // $table->string('bank_name')->nullable();
            // $table->string('bank_branch')->nullable();
            // $table->string('account_name')->nullable();
            // $table->string('account_number')->nullable();
            // $table->string('city')->nullable();
            // $table->string('photo')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
