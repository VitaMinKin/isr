<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => '1',
            'number' => '1',
            'date' => '2021-01-01',
            'signature' => 'Director',
            'title' => 'order of information_security'
        ];

        DB::table('orders')->insert($data);
    }
}
