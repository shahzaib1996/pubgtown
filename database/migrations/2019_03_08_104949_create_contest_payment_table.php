<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contest_id')->unsigned()->index();
            $table->foreign('contest_id')->references('id')->on('contest')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('rank')->default(0);
            $table->integer('kills')->default(0);
            $table->integer('pay_entry')->default(0);
            $table->boolean('check_entry')->default(0);
            $table->integer('prize')->default(0);
            $table->integer('pay_total_prize')->default(0);
            $table->boolean('check_prize')->default(0);
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
        Schema::dropIfExists('contest_payment');
    }
}
