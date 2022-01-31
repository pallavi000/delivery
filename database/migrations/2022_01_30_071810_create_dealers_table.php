<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');
            $table->string('email');
            $table->string('address');
            $table->string('picture');
            $table->string('ntn');
            $table->string('strn');
            $table->integer('company_id');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->string('sales_group')->nullable();
            $table->string('sales_district')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_territory')->nullable();
            
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
        Schema::dropIfExists('dealers');
    }
}
