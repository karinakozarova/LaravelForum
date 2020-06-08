<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminpassword'),
        ]);
        DB::table('users')->insert([
            'name' => 'Martin',
            'email' => 'martin@martin.com',
            'password' => bcrypt('martin'),
        ]);
        DB::table('users')->insert([
            'name' => 'Karina',
            'email' => 'karina@karina.com',
            'password' => bcrypt('karina'),
        ]);
    }
}
