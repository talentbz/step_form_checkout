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
            $table->string('order_id');
            $table->string('date');
            $table->string('duration');
            $table->string('length');
            $table->string('street');
            $table->string('number');
            $table->string('zip_code');
            $table->string('same_addres')->default('off');
            $table->string('same_parking')->default('off');
            $table->string('save_info')->default('off');
            $table->string('company');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('total_price');
            $table->string('payment');
            $table->string('payment_status')->default('Payment completed');
            $table->string('transaction_id');
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
