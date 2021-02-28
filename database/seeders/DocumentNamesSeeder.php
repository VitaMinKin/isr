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
        $rawNames = \file_get_contents(__DIR__ . "/../../app/src/fixtures/documentNames.txt");
        $documentNames = explode("\n", \trim($rawNames));

        array_map(function ($documentName) {
            DB::table('document_names')->insert([
                'title' => trim($documentName)
            ]);
        }, $documentNames);
    }
}
