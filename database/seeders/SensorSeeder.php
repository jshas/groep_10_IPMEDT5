<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensors')->insert([
            'name' => 'North',
            'type' => 'Flame',
            'topic' => 'f1',
            'room_id' => 1,
            'location' => 5
        ]); 
        
        DB::table('sensors')->insert([
            'name' => 'North',
            'type' => 'Temperature',
            'topic' => 't2',
            'room_id' => 1,
            'location' => 55
        ]); 
        
        DB::table('sensors')->insert([
            'name' => 'South',
            'type' => 'Flame',
            'topic' => 'f2',
            'room_id' => 2,
            'location' => 44
        ]); 

        DB::table('sensors')->insert([
            'name' => 'South',
            'type' => 'Temperature',
            'topic' => 't3',
            'room_id' => 2,
            'location' => 12
        ]); 

        DB::table('sensors')->insert([
            'name' => 'South',
            'type' => 'Flame',
            'topic' => 'f3',
            'room_id' => 3,
            'location' => 44
        ]); 

        DB::table('sensors')->insert([
            'name' => 'West',
            'type' => 'Temperature',
            'topic' => 't4',
            'room_id' => 3,
            'location' => 12
        ]); 

        DB::table('sensors')->insert([
            'name' => 'West',
            'type' => 'Flame',
            'topic' => 'f4',
            'room_id' => 3,
            'location' => 9
        ]); 
        
    }
}
