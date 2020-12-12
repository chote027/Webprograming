<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->integer('room_no');
            $table->string('room_owner_fname');
            $table->string('room_owner_lname');
            $table->integer('tel');
            $table->string('room_owner_id_no');
            $table->integer('rent_month');
            $table->integer('elect_cost');
            $table->integer('water_cost');
            $table->integer('others');
            $table->string('roomate');
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
        Schema::dropIfExists('rooms');
    }
}
