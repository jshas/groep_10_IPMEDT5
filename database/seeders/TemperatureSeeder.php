<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TemperatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("temperatuur_sensor")->insert([
            "name" => "Living room",
            "temperature" => 20.0,
        ]);
    }
}
