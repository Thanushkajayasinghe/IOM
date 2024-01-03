<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchToMaleriaLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_to_maleria_labs', function (Blueprint $table) {
            $table->increments('dtblabid');
            $table->date('samplecollectiondate')->nullable();
            $table->string('barcode',100)->nullable();
            $table->integer('samplecollectionid');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('status',20)->nullable();
            $table->String('verify_Cby',20)->nullable();
            $table->String('labno',100)->nullable();
            $table->date('receivedate')->nullable();
            $table->time('receivetime')->nullable();
            $table->String('receive_Cby',20)->nullable();
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
        Schema::dropIfExists('dispatch_to_maleria_labs');
    }
}
