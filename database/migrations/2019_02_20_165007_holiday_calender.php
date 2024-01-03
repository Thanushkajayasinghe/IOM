<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HolidayCalender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('holiday_calender', function (Blueprint $table) {
            $table->increments('holidaycalendarid');
            $table->integer('year')->nullable($value = true);
            $table->string('month', 50)->nullable($value = true);
            $table->integer('day')->nullable($value = true);
            $table->string('stat', 50)->nullable($value = true);
            $table->Date('holiday')->nullable($value = true);
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
        Schema::dropIfExists('set_work_schedule');
    }
}
