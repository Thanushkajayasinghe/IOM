<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IhuRecommendation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ihu_recommendation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('AppointmentNumberNo',100)->nullable();
            $table->string('FirstName',300)->nullable();
            $table->string('LastName',300)->nullable();
            $table->string('CurrentPassportNumber',100)->nullable();
            $table->string('PreviousPassportNumberIfAny',100)->nullable();
            $table->string('Country',100)->nullable();
            $table->string('City',100)->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->string('Gender',100)->nullable();
            $table->string('AddressIfTheCountryOfDomicile',500)->nullable();
            $table->string('Telephone',50)->nullable();
            $table->string('Mobile',50)->nullable();
            $table->string('Email',300)->nullable();
            $table->string('SponsorName',300)->nullable();
            $table->string('AddressDuringStayingInSriLanka',500)->nullable();
            $table->string('Nationality',100)->nullable();
//            $table->string('CounsellingDetails',500)->nullable();
//            $table->string('ConsultationDetails',500)->nullable();
//            $table->string('TestResultDetails',500)->nullable();
            $table->string('FinalReview',50)->nullable();
            $table->string('status',50)->nullable();
            $table->string('Remark',500)->nullable();
            $table->string('created_by', 50)->nullable();
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
        Schema::dropIfExists('ihu_recommendation');
    }
}
