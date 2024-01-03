<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_registration', function (Blueprint $table) {
            $table->increments('registration_id');
            $table->string('reg_passport')->nullable();
            $table->string('reg_app_no')->nullable();
            $table->date('reg_app_date')->nullable();
            $table->string('reg_priority_req_cat')->nullable();
            $table->string('reg_photo_booth')->nullable();
            $table->string('reg_remarks')->nullable();
            $table->boolean('reg_priority_req_app')->nullable();
            $table->boolean('reg_status')->nullable();
        });
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
