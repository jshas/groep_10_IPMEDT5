<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name' => 'Bedroom',
        ]); 
        DB::table('rooms')->insert([
            'name' => 'Living room',
        ]); 

        DB::table('rooms')->insert([
            'name' => 'Basement',
        ]); 
    }
}
