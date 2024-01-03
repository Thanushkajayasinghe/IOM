<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCxr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cxr', function (Blueprint $table) {
            $table->increments('cxr_id');
            $table->string('cxr_passp_no')->nullable();
            $table->string('cxr_app_no')->nullable();
            $table->string('cxr_preg')->nullable();
            $table->date('cxr_test_date')->nullable();
            $table->date('cxr_lmp_date')->nullable();
            $table->string('cxr_result')->nullable();
            $table->boolean('cxr_preg_test_off')->nullable();
            $table->boolean('cxr_counsel')->nullable();
            $table->boolean('cxr_done')->nullable();
            $table->boolean('cxr_not_done')->nullable();
            $table->boolean('cxr_def')->nullable();
            $table->boolean('cxr_preg_sc')->nullable();
            $table->boolean('cxr_app_dec')->nullable();
            $table->boolean('cxr_no_show')->nullable();
            $table->boolean('cxr_child')->nullable();
            $table->boolean('cxr_unbl_unwill_sc')->nullable();
            $table->boolean('cxr_done_other')->nullable();
            $table->string('done_other_text')->nullable();
            $table->boolean('cxr_done_plv_shld')->nullable();
            $table->boolean('cxr_done_dbl_abd_shield')->nullable();
            $table->boolean('cxr_not_done_others')->nullable();
            $table->string('not_done_other_text')->nullable();
            $table->boolean('cxr_radiology')->default('0');
            $table->string('cxr_extra_view', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_cxr');
    }
}
