<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@shop.app',
            'login' => 'user1',
            'password' => bcrypt('password'),
            'api_token' => str_random(60)
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@shop.app',
            'login' => 'user2',
            'password' => bcrypt('password'),
            'api_token' => str_random(60)
        ]);
    }
}