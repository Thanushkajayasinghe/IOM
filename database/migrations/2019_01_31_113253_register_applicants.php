<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisterApplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_applicants', function (Blueprint $table) {
            $table->increments('id');
            //Norml Data
            $table->String('ApplicationType',20)->nullable();
            $table->integer('NoOfFamilyMembers')->nullable();
            $table->date('DateOfArrival')->nullable();
            $table->date('AppointmentDate')->nullable();
            $table->String('PriorityRequest',20)->nullable();
            $table->String('CountryOfOrigin',100)->nullable();
            $table->String('EmailAddress',200)->nullable();
            //Cd Data
            $table->String('CdAddress',300)->nullable();
            $table->String('CdStree',50)->nullable();
            $table->String('CdCity',50)->nullable();
            $table->String('CdStateProvince',50)->nullable();
            $table->String('CdPostalCode',50)->nullable();
            $table->String('CdCountry',100)->nullable();
            $table->String('CdTelephoneFixedLine',50)->nullable();
            $table->String('CdMobile',50)->nullable();
            //SL Data
            $table->String('SlAddress',300)->nullable();
            $table->String('SlStreet',50)->nullable();
            $table->String('SlCity',50)->nullable();
            $table->String('SlPostalCode',50)->nullable();
            $table->String('SlTelephoneFixedLine',50)->nullable();
            $table->String('SlMobile',50)->nullable();
            $table->String('SlStateProvince',50)->nullable();

            //Sponser Details
            $table->String('PreferredContactMethod',50)->nullable();
            $table->String('SponsorName',50)->nullable();
            $table->String('SponsorTelephoneFixedLine',50)->nullable();
            $table->String('SponsorEmailAddress',200)->nullable();
            $table->String('SponsorMobile',50)->nullable();
            $table->String('SponsorAddress',300)->nullable();
			
			$table->integer('InterpretationStatus')->nullable();
			$table->String('InterpretationLanguage', 200)->nullable();		

            $table->String('Cby',20)->nullable();
            $table->String('StatusSaveOrSubmith',20)->nullable();

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
        Schema::dropIfExists('register_applicants');
    }
}
