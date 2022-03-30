<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateRoomTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_topics', function (Blueprint $table) {
            $table->id();
            $table->string('topic')->unique();
            $table->string('room_name')->nullable();
            $table->foreign('room_name')->references('name')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down()
    {
        Schema::table('room_topics', function (Blueprint $table) {
            $table->dropForeign(['room_name']);
        });
        Schema::dropIfExists('room_topics');
    }
}
