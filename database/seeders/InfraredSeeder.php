<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class InfraredSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("infrarood_sensor")->insert([
            "name" => "Living room",
            "ifr_value" => 0,
        ]);
    }
}
