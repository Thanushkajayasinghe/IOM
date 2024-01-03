<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblConsultationMain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_consultation_main', function (Blueprint $table) {
            $table->increments('cm_id');
            $table->string('cm_app_no')->nullable();
            $table->string('cm_pass_no')->nullable();
			$table->string('category')->nullable();
            $table->integer('cm_cough')->nullable();
            $table->integer('cm_haemoptysis')->nullable();
            $table->integer('cm_night_sweats')->nullable();
            $table->integer('cm_weight_loss')->nullable();
            $table->integer('cm_fever')->nullable();
            $table->integer('cm_any')->nullable();
            $table->integer('cm_prev_thor_surgery')->nullable();
            $table->integer('cm_cyanosis')->nullable();
            $table->integer('cm_resp_insufficient')->nullable();
            $table->integer('cm_history_tb')->nullable();
            $table->integer('cm_household_tb')->nullable();
            $table->integer('cm_active_tb')->nullable();
            $table->string('cm_exams_results')->nullable();
            $table->integer('cm_single_fibrous_streak')->nullable();
            $table->integer('cm_bony_islets')->nullable();
            $table->integer('cm_pleural_capping')->nullable();
            $table->integer('cm_unilateral_bilateral')->nullable();
            $table->integer('cm_calcified_nodule')->nullable();
            $table->integer('cm_solitary_granuloma_hilum')->nullable();
            $table->integer('cm_solitary_granuloma_enlarged')->nullable();
            $table->integer('cm_single_multi_calc_pulmonary')->nullable();
            $table->integer('cm_calcified_pleural_lesions')->nullable();
            $table->integer('cm_costophrenic_angle')->nullable();
            $table->integer('cm_notable_apical')->nullable();
            $table->integer('cm_aplcal_fbronodualar')->nullable();
            $table->integer('cm_multi_single_pulmonary_nodu_micronodules')->nullable();
            $table->integer('cm_isolated_hilar')->nullable();
            $table->integer('cm_multi_single_pulmonary_nodu_masses')->nullable();
            $table->integer('cm_non_calcified_pleural_fibrosos')->nullable();
            $table->integer('cm_interstltial_fbrosos')->nullable();
            $table->integer('cm_any_cavitating_lesion')->nullable();
            $table->integer('cm_skeleton_soft_issue')->nullable();
            $table->integer('cm_cardiac_major_vessels')->nullable();
            $table->integer('cm_lung_fields')->nullable();
            $table->integer('cm_other')->nullable();
            $table->string('cm_dpp_comment')->nullable();
            $table->integer('cm_order_sputum_sample')->nullable();

            $table->integer('cm_hiv_1')->nullable();
            $table->integer('cm_hiv_2')->nullable();
            $table->integer('cm_hiv_3')->nullable();
            $table->integer('cm_hiv_4_1')->nullable();
            $table->integer('cm_hiv_4_2')->nullable();
            $table->integer('cm_hiv_5_0')->nullable();
            $table->integer('cm_hiv_5_1')->nullable();
            $table->integer('cm_hiv_6')->nullable();
            $table->integer('cm_hiv_7')->nullable();
            $table->integer('cm_hiv_8')->nullable();
            $table->integer('cm_hiv_9_0')->nullable();
            $table->integer('cm_hiv_9_1')->nullable();
            $table->integer('cm_hiv_10')->nullable();
            $table->integer('cm_hiv_11')->nullable();
            $table->integer('cm_hiv_12')->nullable();
            $table->integer('cm_hiv_13')->nullable();

            $table->integer('cm_Malaria_14')->nullable();
            $table->integer('cm_Malaria_15')->nullable();
            $table->integer('cm_Malaria_16')->nullable();
            $table->integer('cm_Malaria_17')->nullable();
            $table->integer('cm_Malaria_18')->nullable();
            $table->integer('cm_Malaria_19')->nullable();
            $table->integer('cm_Malaria_20')->nullable();

            $table->integer('cm_Filaria_21')->nullable();
            $table->integer('cm_Filaria_22')->nullable();
            $table->integer('cm_Filaria_23')->nullable();
            $table->integer('cm_Filaria_24')->nullable();
            $table->integer('cm_Filaria_25')->nullable();
            $table->integer('cm_Filaria_26')->nullable();


            $table->date('cm_day1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_consultation_main');
    }
}
