<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_users', function (Blueprint $table) {
            $table->Integer('role_id');
             $table->Integer('user_id');
             $table->foreign('role_id')->references('id')->on('roles')->onCascade('delete');
              $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
           // $table->timestamps();
        });
     //   public $timestamps = false;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
