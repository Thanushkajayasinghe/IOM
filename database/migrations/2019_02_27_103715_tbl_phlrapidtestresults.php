<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblPhlrapidtestresults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phlrapidtestresults', function (Blueprint $table) {
            $table->increments('prtr_id');
            $table->string('prtr_appno')->nullable();
            $table->string('prtr_barcode')->nullable();
            $table->string('prtr_test')->nullable();
            $table->string('prtr_result')->nullable();
            $table->string('prtr_comment')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_phlrapidtestresults');
    }
}
