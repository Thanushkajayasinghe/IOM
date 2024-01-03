<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReferToAfc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refer_to_afc', function (Blueprint $table) {
            $table->increments('afcId');
            $table->string('registration_no', 100)->nullable();
            $table->string('passport_no', 500)->nullable();
            $table->date('refer')->nullable();
            $table->string('test_result', 50)->nullable();
            $table->text('comment')->nullable();
            $table->text('remark')->nullable();
            $table->string('status', 30)->nullable();
            $table->string('status_ihu', 30)->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('refer_to_afc');
    }
}
