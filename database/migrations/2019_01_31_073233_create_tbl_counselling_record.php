<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCounsellingRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_counselling_record', function (Blueprint $table) {
            $table->increments('csr_id');
            $table->string('csr_lang')->nullable();
            $table->string('csr_desc')->nullable();
            $table->string('csr_file')->nullable();
            $table->boolean('csr_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_counselling_record');
    }
}
