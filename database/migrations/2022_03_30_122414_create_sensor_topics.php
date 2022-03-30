<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_topics', function (Blueprint $table) {
            $table->id();
            $table->string('topic')->unique();
            $table->foreignId('sensor_id')->unique(); //
            $table->foreign('sensor_id')->references('id')->on('sensors'); // If the sensor is deleted so are the topics;
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
        Schema::table('sensor_topics', function (Blueprint $table) {
            $table->dropForeign(['sensor_id']);
        });
        Schema::dropIfExists('sensor_topics');
    }
}
