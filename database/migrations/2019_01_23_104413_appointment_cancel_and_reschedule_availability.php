<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppointmentCancelAndRescheduleAvailability extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_cancel_and_reschedule_availability', function (Blueprint $table) {
            $table->increments('acrAvailablityId');
            $table->string('appointment_no', 50)->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->date('reschedule_date')->nullable();
            $table->time('reschedule_time')->nullable();
            $table->integer('no_members')->nullable();
            $table->string('status', 50)->nullable();
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
        Schema::dropIfExists('appointment_cancel_and_reschedule_availability');
    }
}
