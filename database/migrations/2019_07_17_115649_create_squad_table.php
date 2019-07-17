<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSquadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('member_1')->unsigned()->index();
            $table->foreign('member_1')->references('id')->on('users');
            $table->bigInteger('member_2')->unsigned()->index();
            $table->foreign('member_2')->references('id')->on('users');
            $table->bigInteger('member_3')->unsigned()->index();
            $table->foreign('member_3')->references('id')->on('users');
            $table->bigInteger('member_4')->unsigned()->index();
            $table->foreign('member_4')->references('id')->on('users');
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
        Schema::dropIfExists('squad');
    }
}
