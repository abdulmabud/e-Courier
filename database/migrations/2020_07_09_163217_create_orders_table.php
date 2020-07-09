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
            $table->bigIncrements('id');
            $table->string('customer_name', 50);
            $table->string('customer_phone', 50);
            $table->string('receiver_name', 50);
            $table->string('receiver_phone', 50);
            $table->string('receiver_address', 50);
            $table->text('product_details');
            $table->string('service_charge', 50);
            $table->string('payment_status', 20);
            $table->string('ref_id', 50);
            $table->string('note', 50);
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
