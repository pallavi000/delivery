<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFaxToDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealers', function (Blueprint $table) {
            $table->string('fax');
            $table->string('area');
            $table->string('contact_person');
            $table->string('zone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealers', function (Blueprint $table) {
            //
        });
    }
}
