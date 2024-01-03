<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSputumCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sputum_collection', function (Blueprint $table) {
            $table->increments('sc_id');
            $table->string('sc_app_no')->nullable();
            $table->string('sc_ppno_no')->nullable();
            $table->string('sc_ok')->nullable();
            $table->string('barcode')->nullable();
            $table->date('date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sputum_collection');
    }
}
