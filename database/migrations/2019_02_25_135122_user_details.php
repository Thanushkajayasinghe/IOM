<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('user_serial');
            $table->string('user_id', 50)->nullable();
            $table->string('title', 50)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('user_email', 100)->nullable();
            $table->string('tel_no', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });

        // Insert sample login
        DB::table('user_details')->insert(
            array(
                'user_serial' => 1,
                'user_id' => '1',
                'title' => 'Mr.',
                'first_name' => 'Thanushka',
                'last_name' => 'Jayasinghe',
                'status' => 'Active',
                'created_by' => '1',
                'created_at' => '2018-02-28 00:00:00'

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
        Schema::dropIfExists('user_details');
    }
}
