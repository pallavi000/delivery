<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('daily_order_id');
            $table->string('delivery_order_id');
            $table->string('daily_order_weight');
            $table->string('delivery_order_weight');
            $table->string('total_weight');
            $table->string('company_id');
            $table->string('destination');
            $table->string('vehicle_id');
            $table->string('driver_id');
            $table->string('receiver')->nullable();
            $table->string('commission');
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
        Schema::dropIfExists('invoices');
    }
}
