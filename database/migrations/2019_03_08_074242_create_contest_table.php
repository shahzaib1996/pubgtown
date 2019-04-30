<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('map');
            $table->date('contest_date');
            $table->time('contest_time');
            $table->integer('prize_pool');
            $table->integer('entry_fee');
            $table->integer('per_kill');
            $table->integer('rank_1');
            $table->integer('rank_2');
            $table->integer('rank_3');
            $table->integer('rank_4');
            $table->integer('rank_5');
            $table->integer('no_of_teams');
            $table->integer('total_collection');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_deleted')->default(0);
            $table->string('room_id')->nullable();
            $table->string('room_password')->nullable();
            $table->boolean('show_room_details')->default(0);
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
        Schema::dropIfExists('contest');
    }
}
