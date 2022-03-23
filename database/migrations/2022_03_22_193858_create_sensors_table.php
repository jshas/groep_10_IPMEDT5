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
            $table->string('room_name');
            $table->foreign('room_name')->references('name')->on('rooms')->onDelete('cascade');
            $table->integer('value')->default(0);
        });

        
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('sensors');
    }
}
