<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_messages', function (Blueprint $table) {
            $table->id()->startingValue(1);
            $table->string("room_topic")->nullable();
            $table->string('sensor_topic')->default('t1');
            $table->foreign('sensor_topic')->references('topic')->on('sensors')->onDelete('cascade')->onUpdate('cascade');;
            // value van de message
            $table->float('value')->default(0); // flame = 0,1 
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensor_messages', function (Blueprint $table) {
            $table->dropForeign(['sensor_topic']);
          });
        Schema::dropIfExists('sensor_messages');
    }
}
