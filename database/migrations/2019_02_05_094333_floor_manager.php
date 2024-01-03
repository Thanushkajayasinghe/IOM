<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FloorManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floor_manager', function (Blueprint $table) {
            $table->increments('floor_manager_auto_id');
            $table->string('token_no', 50)->nullable();
            $table->string('current_queue', 100)->nullable();
            $table->string('change_priority', 100)->nullable();
            $table->string('change_queue', 100)->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('created_by');
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
        Schema::dropIfExists('floor_manager');
    }
}
