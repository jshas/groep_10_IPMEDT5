<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

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
            'topic' => 'bedroom',
        ]); 

        DB::table('room_topics')->insert([
            'topic' => 'Living room',

        ]); 

        DB::table('room_topics')->insert([
            'topic' => 'Basement',
        ]); 
    }
}
