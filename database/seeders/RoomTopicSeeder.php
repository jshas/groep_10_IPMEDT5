<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoomTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_topics')->insert([
            'name' => 'bedroom',
            'room_name' => 'Bedroom',
        ]); 

        DB::table('room_topics')->insert([
            'name' => 'Living room',
            'room_name' => 'Living room',
        ]); 
    }
}
