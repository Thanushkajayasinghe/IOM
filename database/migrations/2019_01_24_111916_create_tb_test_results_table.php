<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_test_results', function (Blueprint $table) {
            $table->increments('tbtestid');
            $table->string('labno',100)->nullable();
            $table->string('genexpert',100)->nullable();
            $table->string('afb',50)->nullable();
            $table->string('liquidculture',100)->nullable();
            $table->string('solidculture',100)->nullable();
            $table->string('drugsensitivity',100)->nullable();
            $table->string('drugdetail',100)->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_test_results');
    }
}
