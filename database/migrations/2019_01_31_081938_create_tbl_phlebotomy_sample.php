<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPhlebotomySample extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phlebotomy_sample', function (Blueprint $table) {
            $table->increments('ps_id');
            $table->string('ps_app_no')->nullable();
            $table->string('ps_passp_no')->nullable();
            $table->boolean('ps_hiv_elisa')->nullable();
            $table->string('ps_hiv_no_copies')->nullable();
            $table->string('ps_hiv_test_kit')->nullable();
            $table->boolean('ps_malaria')->nullable();
            $table->string('ps_malaria_no_copies')->nullable();
            $table->string('ps_malaria_test_kit')->nullable();
            $table->boolean('ps_filaria')->nullable();
            $table->string('ps_filaria_no_copies')->nullable();
            $table->string('ps_filaria_test_kit')->nullable();
            $table->boolean('ps_shcg')->nullable();
            $table->string('ps_shcg_no_copies')->nullable();
            $table->string('ps_shcg_test_kit')->nullable();
            $table->string('ps_hiv_barcode')->nullable();
            $table->string('ps_malaria_barcode')->nullable();
            $table->string('ps_filaria_barcode')->nullable();
            $table->string('ps_shcg_barcode')->nullable();
            $table->string('ps_sample_col_1')->nullable();
            $table->string('ps_sample_col_2')->nullable();
            $table->string('hiv_status',50)->nullable();
            $table->string('malaria_status',50)->nullable();
            $table->string('filaria_status',50)->nullable();
            $table->string('shcg_status',50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_phlebotomy_sample');
    }
}
