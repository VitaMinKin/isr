<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rawLines = \file_get_contents(__DIR__ . "/../../app/src/fixtures/documentNames.txt");
        $documentList = explode("\n", \trim($rawLines));
            
        array_map(function ($documentLine) {
            $documentInfo = explode("-", \trim($documentLine));
            $title = trim($documentInfo[0]);
            $limit1C = $documentInfo[1] ?? null;
            $limit2C = $documentInfo[2] ?? null;
            $limit3C = $documentInfo[3] ?? null;

            DB::table('document_names')->insert([
                'title' => $title,
                'limit_1_c' => $limit1C,
                'limit_2_c' => $limit2C,
                'limit_3_c' => $limit3C
            ]);
        }, $documentList);
    }
}
