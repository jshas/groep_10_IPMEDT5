<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorvalueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensorvalue', function (Blueprint $table) {
           // $table->id()->autoIncrement();
            #meesturen
           // $table->foreignId('sensor_id');
           // $table->foreign('sensor_id')->references('id')->on('sensors');

            #meesturen topic: room_topic/sensor_topic
            $table->string("room_topic");
            $table->string('sensor_topic');

            // value van de message
            $table->float('IRvalue')->default(0); // flame = 0,1 temperature = [0 ... n]
            $table->float('TEMPvalue')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensorvalue');
    }
}
