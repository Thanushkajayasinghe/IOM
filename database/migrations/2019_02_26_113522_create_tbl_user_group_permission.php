<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblUserGroupPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_group_permission', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_group_serial')->nullable();
            $table->integer('user_page_id')->nullable();
            $table->string('read_only', '50')->nullable();
            $table->string('read_write', '50')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_group_permission');
    }
}
