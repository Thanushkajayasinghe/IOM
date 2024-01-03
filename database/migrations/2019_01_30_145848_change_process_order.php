<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProcessOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_process_order', function (Blueprint $table) {
            $table->increments('change_order_id');
            $table->string('type', '20');
            $table->integer('created_by');
            $table->timestamps();
        });

        // Insert sample login
        DB::table('change_process_order')->insert(
            array(
                'change_order_id' => 1,
                'type' => '1',
                'created_by' => '1',
                'created_at' => '2018-01-01 00:00:00',
                'updated_at' => '2018-01-01 00:00:00'

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
        Schema::dropIfExists('change_process_order');
    }
}
