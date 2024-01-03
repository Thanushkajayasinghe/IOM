<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResidentVisaDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_visa_details', function (Blueprint $table) {
            $table->increments('resident_visa_details_id');
            $table->date('date')->nullable();
            $table->string('passport_no', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('visa_no', 100)->nullable();
            $table->date('visa_issue_date')->nullable();
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
        Schema::dropIfExists('resident_visa_details');
    }
}
