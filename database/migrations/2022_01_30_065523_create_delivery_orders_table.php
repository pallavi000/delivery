<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('do_number');
            $table->integer('dealer_id');
            $table->string('item_type');
            $table->string('brand');
            $table->double('quantity', 12, 2);
            $table->string('packing_type');
            $table->float('noofbags',12,2);
            $table->string('zone');
            $table->timestamp('expire_date');
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
        Schema::dropIfExists('delivery_orders');
    }
}
