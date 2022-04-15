<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SensorMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensor_messages')->insert([
            'sensor_topic' => 't1',
            'value' => 33
        ]);
        DB::table('sensor_messages')->insert([
            'sensor_topic' => 'f1',
            'value' => 0
        ]);
        DB::table('sensor_messages')->insert([
            'sensor_topic' => 't2',
            'value' => 39
        ]);
        DB::table('sensor_messages')->insert([
            'sensor_topic' => 'f2',
            'value' => 0
        ]);
        DB::table('sensor_messages')->insert([
            'sensor_topic' => 't3',
            'value' => 39
        ]);
        DB::table('sensor_messages')->insert([
            'sensor_topic' => 'f3',
            'value' => 0
        ]);
        DB::table('sensor_messages')->insert([
            'sensor_topic' => 't4',
            'value' => 39
        ]);
        DB::table('sensor_messages')->insert([
            'sensor_topic' => 'f4',
            'value' => 0
        ]);
    }
}
