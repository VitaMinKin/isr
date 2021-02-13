<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MilitaryRanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawRanks = \file_get_contents(__DIR__ . "/../../app/src/fixtures/ranks.txt");
        $ranks = explode("\n", \trim($rawRanks));
        
        array_map(function($rank) {
            DB::table('military_ranks')->insert([
                'name' => trim($rank)
            ]);
        }, $ranks);
    }
}
