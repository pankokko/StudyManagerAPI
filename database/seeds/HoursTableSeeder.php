<?php

use Illuminate\Database\Seeder;

class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('hours')->truncate();


        DB::table('hours')->insert([

            [
                'id'         => 1,
                'time_hour'  => 0,
                'convert_jp' => '午前0時',
            ],

            [
                'id'         => 2,
                'time_hour'  => 1,
                'convert_jp' => '午前1時',
            ],

            [
                'id'         => 3,
                'time_hour'  => 2,
                'convert_jp' => '午前2時',
            ],

            [
                'id'         => 4,
                'time_hour'  => 3,
                'convert_jp' => '午前3時',
            ],

            [
                'id'         => 5,
                'time_hour'  => 4,
                'convert_jp' => '午前4時',
            ],

            [
                'id'         => 6,
                'time_hour'  => 5,
                'convert_jp' => '午前5時',
            ],

            [
                'id'         => 7,
                'time_hour'  => 6,
                'convert_jp' => '午前6時',
            ],

            [
                'id'         => 8,
                'time_hour'  => 7,
                'convert_jp' => '午前7時',
            ],

            [
                'id'         => 9,
                'time_hour'  => 8,
                'convert_jp' => '午前8時',
            ],

            [
                'id'         => 10,
                'time_hour'  => 9,
                'convert_jp' => '午前9時',
            ],

            [
                'id'         => 11,
                'time_hour'  => 10,
                'convert_jp' => '午前10時',
            ],

            [
                'id'         => 12,
                'time_hour'  => 11,
                'convert_jp' => '午前11時',
            ],

            [
                'id'         => 13,
                'time_hour'  => 12,
                'convert_jp' => '12時',
            ],

            [
                'id'         => 14,
                'time_hour'  => 13,
                'convert_jp' => '13時',
            ],

            [
                'id'         => 15,
                'time_hour'  => 14,
                'convert_jp' => '14時',
            ],

            [
                'id'         => 16,
                'time_hour'  => 15,
                'convert_jp' => '15時',
            ],

            [
                'id'         => 17,
                'time_hour'  => 16,
                'convert_jp' => '16時',
            ],

            [
                'id'         => 18,
                'time_hour'  => 17,
                'convert_jp' => '17時',
            ],

            [
                'id'         => 19,
                'time_hour'  => 18,
                'convert_jp' => '18時',
            ],

            [
                'id'         => 20,
                'time_hour'  => 19,
                'convert_jp' => '19時',
            ],

            [
                'id'         => 21,
                'time_hour'  => 20,
                'convert_jp' => '20時',
            ],

            [
                'id'         => 22,
                'time_hour'  => 21,
                'convert_jp' => '21時',
            ],

            [
                'id'         => 23,
                'time_hour'  => 22,
                'convert_jp' => '22時',
            ],

            [
                'id'         => 24,
                'time_hour'  => 23,
                'convert_jp' => '23時',
            ],


        ]);

    }
}
