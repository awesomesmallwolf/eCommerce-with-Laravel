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

            $table->foreignId('user_id')->constrained('users','id')->onDelete('cascade');
            $table->bigInteger("amount");
            $table->string("payment_mode");
            $table->bigInteger("pro_order_id");
            $table->boolean("payment_status")->default(0);
            $table->bigInteger("payment_id")->default("0");
            $table->bigInteger("transaction_id")->default(0);
            $table->boolean("coupon_used");
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
