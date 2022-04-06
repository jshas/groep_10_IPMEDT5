<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SmsCountingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms_counting')->insert([
            'count' => 0, 
        ]); 
    }
}
