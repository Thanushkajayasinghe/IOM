<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPaymentCounter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payment_counter', function (Blueprint $table) {
            $table->increments('pc_id');
            $table->string('pc_passp_no')->nullable();
            $table->string('pc_appointment_no')->nullable();
            $table->float('pc_fee')->nullable();
            $table->string('pc_pay_mode')->nullable();
            $table->string('pc_receipt_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payment_counter');
    }
}
