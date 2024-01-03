<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCounselingDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_counseling_details', function (Blueprint $table) {
            $table->increments('cd_id');
            $table->string('cd_app_no')->nullable();
            $table->string('cd_remarks')->nullable();
            $table->string('cd_sign')->nullable();
            $table->boolean('cd_complete')->nullable();
            $table->string('cd_tab_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_counseling_details');
    }
}
