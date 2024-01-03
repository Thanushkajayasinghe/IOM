<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounsellingMaindisplay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_counselling_maindisplay', function (Blueprint $table) {
            $table->increments('csmd_id');
            $table->string('csmd_desc')->nullable();
            $table->boolean('csmd_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_counselling_maindisplay');
    }
}
