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
    }
}
