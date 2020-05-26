<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => "Unknown",
            'description' => "All Unknown posts go here",
        ]);
        DB::table('categories')->insert([
                'name' => "Random",
                'description' => "All random posts go here",
            ]
        );
    }
}
