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
        // \App\Models\User::factory(10)->create();
        $this->call(MilitaryRanksSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(DocumentNamesSeeder::class);

        \App\Models\Officer::factory(4)->create();
        \App\Models\ObjectDocument::factory(4)->create();
    }
}
