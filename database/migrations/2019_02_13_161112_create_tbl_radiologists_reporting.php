<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblRadiologistsReporting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_radiologists_reporting', function (Blueprint $table) {
            $table->increments('rr_id');
            $table->string('rr_app_no');
            $table->string('rr_pass_no');
            $table->integer('rr_single_fibrous_streak');
            $table->integer('rr_bony_islets');
            $table->integer('rr_pleural_capping');
            $table->integer('rr_unilateral_bilateral');
            $table->integer('rr_calcified_nodule');
            $table->integer('rr_solitary_granuloma_hilum');
            $table->integer('rr_solitary_granuloma_enlarged');
            $table->integer('rr_single_multi_calc_pulmonary');
            $table->integer('rr_calcified_pleural_lesions');
            $table->integer('rr_costophrenic_angle');
            $table->integer('rr_notable_apical');
            $table->integer('rr_aplcal_fbronodualar');
            $table->integer('rr_multi_single_pulmonary_nodu_micronodules');
            $table->integer('rr_isolated_hilar');
            $table->integer('rr_multi_single_pulmonary_nodu_masses');
            $table->integer('rr_non_calcified_pleural_fibrosos');
            $table->integer('rr_interstltial_fbrosos');
            $table->integer('rr_any_cavitating_lesion');
            $table->integer('rr_skeleton_soft_issue');
            $table->integer('rr_cardiac_major_vessels');
            $table->integer('rr_lung_fields');
            $table->integer('rr_other');
            $table->string('rr_comment1')->nullable();
            $table->string('rr_comment2')->nullable();
            $table->longText('xrayimgpath')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_radiologists_reporting');
    }
}
