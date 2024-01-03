<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CounselingTab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counselling_tab', function (Blueprint $table) {
            $table->increments('CTid');
            $table->string('registration_no')->nullable();
            $table->string('remark',500)->nullable();
            $table->longText('signature')->nullable();
            $table->integer('cby');
            $table->dateTime('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
