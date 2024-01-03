<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegisterApplicantDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_applicant_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('FkId');
            $table->String('AppointmentNumber',50)->nullable();
            $table->String('MemberStatus',50)->nullable();
            $table->String('Title',20)->nullable();
            $table->String('FirstName',300)->nullable();
            $table->String('LastName',300)->nullable();
            $table->String('CivilStatus',50)->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->String('Gender',20)->nullable();
            $table->String('Nationality',100)->nullable();
            $table->String('PassportNumber',100)->nullable();
            $table->String('PreviousPassportIfAny',100)->nullable();
            $table->String('CountryOfBirth',100)->nullable();
            $table->String('CountryVisitedDuringLast3Years',500)->nullable();
            $table->String('PassportImgPath',500)->nullable();
            $table->String('BiometricsImgPath',500)->nullable();
            $table->String('over60YearsCheck',20)->nullable();
            $table->String('specialMedicalNeedsCheck',20)->nullable();
			$table->integer('PregnancyStatus')->nullable();
            $table->String('status',20)->nullable();
            $table->String('Cby',20)->nullable();
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
        Schema::dropIfExists('register_applicant_details');
    }
}
