<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MilitaryRanksSeeder extends Seeder
{
    static $ranks = [
        'рядовой',
        'матрос',
        'ефрейтор',
        'старший маторс',
        'младший сержант',
        'старшина 2 статьи',
        'сержант',
        'старшина 1 статьи',
        'старший сержант',
        'главный корабельный старшина',
        'старшина',
        'прапорщик',
        'мичман',
        'старший прапорщик',
        'старший мичман',
        'лейтенант',
        'старший лейтенант',
        'капитан',
        'капитан-лейтенант',
        'майор',
        'капитан 3 ранга',
        'подполковник',
        'капитан 2 ранга',
        'полковник',
        'капитан 1 ранга',
        'генерал-майор',
        'контр-адмирал',
        'генерал-лейтенант',
        'вице-адмирал',
        'генерал-полковник',
        'адмирал',
        'генерал армии',
        'адмирал флота'
    ];
    
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_map(function($rank) {
            DB::table('military_ranks')->insert([
                'name' => $rank
            ]);
        }, self::$ranks);
    }
}
