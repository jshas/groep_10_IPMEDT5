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
            'location' => 5
        ]); 
        
        DB::table('sensors')->insert([
            'name' => 'North',
            'type' => 'Temperature',
            'room_name' => 'Living room',
            'value' => 22,
            'location' => 55
        ]); 
        
        DB::table('sensors')->insert([
            'name' => 'South',
            'type' => 'Flame',
            'room_name' => 'Bedroom',
            'value' => 0,
            'location' => 44
        ]); 

        DB::table('sensors')->insert([
            'name' => 'South',
            'type' => 'Temperature',
            'room_name' => 'Bedroom',
            'value' => 20,
            'location' => 12
        ]); 
        
    }
}
