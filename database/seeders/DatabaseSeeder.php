<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'=>'User',
            'username'=>'user',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('user'),
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(3)->create();
        \App\Models\Quiz::factory(20)->create();
        \App\Models\Question::factory(100)->create();
    }
}
