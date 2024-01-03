<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestSampleCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_sample_collection', function (Blueprint $table) {
            $table->increments('samcollid');
            $table->string('barcode',100)->nullable();
            $table->string('status',20)->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('test_sample_collection');
    }
}
