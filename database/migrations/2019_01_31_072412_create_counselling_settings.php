<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounsellingSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_counselling_settings', function (Blueprint $table) {
            $table->increments('cs_id');
            $table->string('cs_script')->nullable();
            $table->string('cs_inst')->nullable();
            $table->boolean('cs_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_counselling_settings');
    }
}
