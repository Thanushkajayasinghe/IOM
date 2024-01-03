<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCounselingChecklist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_counseling_checklist', function (Blueprint $table) {
            $table->increments('cchk_id');
            $table->string('cchk_app_no')->nullable();
            $table->string('cchk_desc')->nullable();
            $table->boolean('cchk_result')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_counseling_checklist');
    }
}
