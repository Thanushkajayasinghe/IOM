<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPhlebotomyRtr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phlebotomy_rtr', function (Blueprint $table) {
            $table->increments('prtr_id');
            $table->string('prtr_app_no')->nullable();
            $table->string('prtr_ppno_no')->nullable();
            $table->string('prtr_barcode')->nullable();
            $table->string('prtr_test')->nullable();
            $table->string('prtr_result')->nullable();
            $table->string('prtr_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_phlebotomy_rtr');
    }
}
