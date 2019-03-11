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
            $table->bigInteger('identification_id')->unsigned()->index();
            $table->foreign('identification_id')->references('id')->on('identification')->onDelete('cascade');
            $table->integer('rank');
            $table->integer('kills');
            $table->integer('pay_entry');
            $table->boolean('check_entry');
            $table->integer('prize');
            $table->integer('pay_total_prize');
            $table->boolean('check_prize');
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
