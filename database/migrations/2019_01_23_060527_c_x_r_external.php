<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CXRExternal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cxr_external', function (Blueprint $table) {
            $table->increments('cxautorid');
            $table->string('registrationno',50)->nullable();
            $table->string('cxrid',50)->nullable();
            $table->string('passportno',100)->nullable();
            $table->string('pregnancy',20)->nullable();
            $table->date('testdate')->nullable();
            $table->date('lmpdate')->nullable();
            $table->string('result',50)->nullable();
            $table->string('pregnancytestoffered',10)->nullable();
            $table->string('counselingdone',10)->nullable();
            $table->string('deferred',10)->nullable();
            $table->string('pregnant',10)->nullable();
            $table->string('applicant',10)->nullable();
            $table->string('noshow',10)->nullable();
            $table->string('childlessthan11',10)->nullable();
            $table->string('unable',10)->nullable();
            $table->string('cxrnotdoneother',10)->nullable();
            $table->string('cxrnotdoneothertxt',100)->nullable();
            $table->string('Shielding',10)->nullable();
            $table->string('cxrdoneothers',10)->nullable();
            $table->string('cxrdoneotherstxt',100)->nullable();
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
        Schema::dropIfExists('cxr_external');
    }
}
