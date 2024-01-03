<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_table', function (Blueprint $table) {
            $table->increments('temp_id');
            $table->string('temp_passport')->nullable();
            $table->string('temp_app_no')->nullable();
            $table->integer('temp_token_no')->nullable();
            $table->integer('temp_reg')->nullable();
            $table->integer('temp_reg_counter')->nullable();
            $table->integer('temp_counsel')->nullable();
            $table->integer('temp_counsel_counter')->nullable();
            $table->integer('temp_counsel_panic')->nullable();
            $table->integer('temp_cxr')->nullable();
            $table->integer('temp_cxr_counter')->nullable();
            $table->integer('temp_phlebotomy')->nullable();
            $table->integer('temp_phlebotomy_counter')->nullable();
            $table->integer('temp_payment')->nullable();
            $table->integer('temp_payment_counter')->nullable();
            $table->integer('temp_consult')->nullable();
            $table->integer('temp_consult_counter')->nullable();
            $table->integer('temp_sputum')->nullable();
            $table->integer('temp_sputum_counter')->nullable();
            $table->integer('temp_radiology')->nullable();
            $table->integer('temp_radiology_counter')->nullable();
            $table->string('tab_no',50)->nullable();
            $table->string('tab_status')->nullable();
            $table->timestamp('tab_complete_date')->nullable();
            $table->string('rad_rep_status',10)->nullable();
            $table->string('rad_rep_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_table');
    }
}
