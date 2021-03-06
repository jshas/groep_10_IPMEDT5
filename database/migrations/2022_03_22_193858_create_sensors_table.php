<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('North');
            $table->string('type');
            $table->string('topic')->unique();
            $table->foreignId('room_id');
            // $table->string('room_name');

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

            $table->integer('location');
        });
        
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
    Schema::table('sensors', function (Blueprint $table) {
        $table->dropForeign(['room_id']);
      });
        Schema::dropIfExists('sensors');
    }
}