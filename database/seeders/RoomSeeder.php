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
            'layout' => json_encode([
                1, 2, 3, 4, 5, 6, 7, 8, 9,
                11, 12, 13, 14, 15, 16, 17, 18, 19,
                21, 22, 23, 24, 25, 26, 27, 28, 29,
                81, 82, 83, 84, 85, 86, 87,
                91, 92, 93, 94, 95, 96, 97]),
        ]); 
        DB::table('rooms')->insert([
            'name' => 'Living room',
            'layout' => json_encode
            ([
                1, 2, 3, 4, 5, 6, 7, 8, 9,
                11, 13, 14, 15, 16, 17,
                21, 22, 23, 24, 25, 26, 27,
                81, 82, 83, 84, 85,
                91, 92, 93, 94, 95,
            ])
        ]); 

        DB::table('rooms')->insert([
            'name' => 'Basement',
            'layout' => json_encode([
                1, 2, 3, 4, 5, 6, 7, 8, 9,
                11, 12, 13, 14, 15, 16, 17, 18, 19,
                21, 22, 23, 24, 25, 26, 27, 28, 29,
                31, 32, 33, 34, 35, 36, 37, 38, 39,
                81, 82, 83, 84, 85, 86, 87,
                91, 92, 93, 94, 95, 96, 97]),
        ]); 
    }
}
