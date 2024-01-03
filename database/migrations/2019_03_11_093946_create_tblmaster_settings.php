<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblmasterSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_settings', function (Blueprint $table) {
            $table->increments('mastersettingsid');
            $table->integer('noregularappointments');
            $table->integer('nopriorityappointments');
            $table->integer('nosputumcollections');
            $table->integer('novisaextensions');
            $table->integer('timeslotperoneuser');
            $table->time('starttime');
            $table->time('endtime');
            $table->date('effectivedate');
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
        Schema::dropIfExists('master_settings');
    }
}
