<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->integer('order_number');
            $table->integer('company_id');
            $table->integer('dealer_id');
            $table->string('destination');
            $table->string('item_type');
            $table->string('brand');
            $table->string('quantity');
            $table->string('rate_per_ton');
            $table->string('additional_charges');
            $table->string('status');
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
        Schema::dropIfExists('daily_orders');
    }
}
