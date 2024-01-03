<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblReferToOther extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_refer_to_other', function (Blueprint $table) {
            $table->increments('other_id');
            $table->string('reg_no', '100')->nullable();
            $table->string('doctor_name', '255')->nullable();
            $table->string('institute', '255')->nullable();
            $table->string('remark', '255')->nullable();
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
        Schema::dropIfExists('tbl_refer_to_other');
    }
}
