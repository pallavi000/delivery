<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddErptToInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
             $table->string('erpt')->nullable();
            $table->string('arpt')->nullable();
            $table->string('cpt')->nullable();
            $table->string('opt')->nullable();
            $table->string('total_qauantity')->nullable();
            $table->string('fixed_commission')->nullable();
            $table->string('ofc')->nullable();
            $table->string('advance_freight')->nullable();
            $table->string('balance_freight')->nullable();
            $table->string('total_freight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
}
