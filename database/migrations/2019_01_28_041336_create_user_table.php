<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('user_serial')->nullable();
            $table->integer('user_group')->nullable();
            $table->longText('signature')->nullable();
            $table->timestamps();
        });

        // Insert sample login
        DB::table('users')->insert(
            array(
                'name' => 'Thanushka',
                'email' => '11',
                'password' => '$2y$10$tfLtMTM/BC6VNzt0ymFA.eb7gHYu/An32QmVDh9tlX9JXhqIB8a76',
                'remember_token' => 'hQpEOa5qSZnYmyktqHqQQfW2uGdBsPpHAwsMpD5ZpYqjYilf3hCiSEG1dwIU',
                'user_serial' => '1',
                'user_group' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
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
        Schema::dropIfExists('users');
    }
}
