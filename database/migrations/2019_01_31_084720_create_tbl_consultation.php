<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblConsultation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_consultation', function (Blueprint $table) {
            $table->increments('cnstl_id');
            $table->string('cnstl_lang')->nullable();
            $table->string('cnstl_desc')->nullable();
            $table->string('cnstl_file')->nullable();
            $table->boolean('cnstl_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_consultation');
    }
}
