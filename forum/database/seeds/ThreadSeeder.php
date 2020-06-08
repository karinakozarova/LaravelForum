<?php

use Illuminate\Database\Seeder;

class ThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Threads::create([
            'title' => 'First thread',
            'description' => 'First thread description',
            'author_id' => '1',
            'category_id' => '1',
        ]);
    }
}
