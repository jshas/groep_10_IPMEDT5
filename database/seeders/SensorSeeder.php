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
            'room_name' => 'Living room',
            'value' => 0,
            'Ylocation' => 5,
            'Xlocation' => 15,
        ]); 
        
        DB::table('sensors')->insert([
            'name' => 'North',
            'type' => 'Temperature',
            'room_name' => 'Living room',
            'value' => 22,
            'Ylocation' => 55,
            'Xlocation' => 25,
        ]); 
        
        DB::table('sensors')->insert([
            'name' => 'South',
            'type' => 'Flame',
            'room_name' => 'Bedroom',
            'value' => 0,
            'Ylocation' => 63,
            'Xlocation' => 22,
        ]); 

        DB::table('sensors')->insert([
            'name' => 'South',
            'type' => 'Temperature',
            'room_name' => 'Bedroom',
            'value' => 20,
            'Ylocation' => 18,
            'Xlocation' => 80,
        ]); 
        
    }
}
