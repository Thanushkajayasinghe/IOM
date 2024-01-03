<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MalariaTestResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malaria_test_results', function (Blueprint $table) {
            $table->increments('mtid');
            $table->string('labno', 100)->nullable();
            $table->string('result', 50)->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('remark', 100)->nullable();
            $table->string('created_by', 50)->nullable();
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
        Schema::dropIfExists('malaria_test_results');
    }
}
