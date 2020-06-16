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
            'slug' => "unknown",
            'description' => "All Unknown posts go here",
        ]);

        DB::table('categories')->insert([
                'name' => "Random",
                'slug' => "random",
                'description' => "All random posts go here",
            ]
        );
    }
}
