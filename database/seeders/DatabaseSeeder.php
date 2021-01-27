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
        \App\Models\User::factory()->create([
            'email' => 'brian.sanchez@accesa.me',
            'password' => bcrypt('123456')
        ]);
        \App\Models\Note::factory(20)->create();
    }
}
