<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueueMngmt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_queue_mgt_set', function (Blueprint $table) {
            $table->increments('qms_id');
            $table->string('qms_counter')->nullable();
            $table->integer('qms_counter_no')->nullable();
            $table->time('qms_start_time')->nullable();
            $table->time('qms_end_time')->nullable();
            $table->boolean('qms_in_operation')->nullable();
            $table->boolean('qms_status')->nullable();
        });

        // Insert sample login
        DB::table('tbl_queue_mgt_set')->insert(
            array(
                'qms_id' => 1,
                'qms_counter' => 'Registration',
                'qms_counter_no' => '1',
                'qms_start_time' => '02:00:00',
                'qms_end_time' => '22:00:00',
                'qms_in_operation' => 'true',
                'qms_status' => 'true'
            )
        );
        DB::table('tbl_queue_mgt_set')->insert(
            array(
                'qms_id' => 2,
                'qms_counter' => 'Counseling',
                'qms_counter_no' => '1',
                'qms_start_time' => '01:00:00',
                'qms_end_time' => '21:00:00',
                'qms_in_operation' => 'true',
                'qms_status' => 'true'
            )
        );
        DB::table('tbl_queue_mgt_set')->insert(
            array(
                'qms_id' => 3,
                'qms_counter' => 'Radiography',
                'qms_counter_no' => '1',
                'qms_start_time' => '02:00:00',
                'qms_end_time' => '23:00:00',
                'qms_in_operation' => 'true',
                'qms_status' => 'true'
            )
        );
        DB::table('tbl_queue_mgt_set')->insert(
            array(
                'qms_id' => 4,
                'qms_counter' => 'Radiology',
                'qms_counter_no' => '1',
                'qms_start_time' => '02:00:00',
                'qms_end_time' => '23:00:00',
                'qms_in_operation' => 'true',
                'qms_status' => 'true'
            )
        );
        DB::table('tbl_queue_mgt_set')->insert(
            array(
                'qms_id' => 5,
                'qms_counter' => 'Rhlebotomy',
                'qms_counter_no' => '1',
                'qms_start_time' => '02:00:00',
                'qms_end_time' => '21:00:00',
                'qms_in_operation' => 'true',
                'qms_status' => 'true'
            )
        );
        DB::table('tbl_queue_mgt_set')->insert(
            array(
                'qms_id' => 6,
                'qms_counter' => 'Consultation',
                'qms_counter_no' => '1',
                'qms_start_time' => '02:00:00',
                'qms_end_time' => '21:00:00',
                'qms_in_operation' => 'true',
                'qms_status' => 'true'
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_registration');
    }
}
