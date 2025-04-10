<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [ 
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('Aa123456'),
                'role' => 'admin'
            ],
            [
                'name' => 'User Test',
                'email' => 'normal@example.com',
                'password' => bcrypt('Password123'),
                'role' => 'normal_user'
            ],
            [
                'name' => 'Visitor',
                'email' => 'user@example.com',
                'password' => bcrypt('Password123'),
                'role' => 'visitor'
            ]
        ];

        DB::table('users')->insert($users);
    }
}
