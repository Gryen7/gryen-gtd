<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => str_random(10),
            'description' => str_random(200),
            'content' => str_random(800),
            'status' => 1
        ]);
    }
}
