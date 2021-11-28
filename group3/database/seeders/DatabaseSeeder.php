<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'user_name' => 'System Admin',
                'email' => '123demo456user@gmail.com',
                'password' => Hash::make('incorr3ct'),
                'role' => '0',
            ]
        );
        DB::table('hotels')->insert(
            [
                'hotel_name' => 'Lotte Hotel',
                'location' => 'No.82, Sin Phyu Shin Avenue, Pyay Road, 61/2 Mile, Ward 11, Hlaing Township, 11051 Yangon',
                'description' => '5-star',
                'phone' => '+95 019351000',
            ]

        );
        DB::table('hotels')->insert(
            [
                'hotel_name' => 'Novotel Hotel',
                'location' => '459 Pyay Road Kamayut, 11041 Yangon, Myanmar',
                'description' => '5-star',
                'phone' => '+95 - 251186014',
            ]
        );
        DB::table('hotels')->insert(
            [
                'hotel_name' => 'Sedona Hotel',
                'location' => 'No. 1, Kaba Aye Pagoda Road, Yankin Township, 11181 Yangon, Myanmar',
                'description' => '5-star',
                'phone' => '+95 - 18605377',
            ]
        );
    }
}
