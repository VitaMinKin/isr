<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $fillable = [
        'military_rank',
        'surname',
        'name',
        'patronymic',
        'military_position'
    ];

    public function militaryRanks()
    {
        return $this->belongsTo('\App\Models\MilitaryRank', 'military_rank');
    }

    public function forceManagments()
    {
        return $this->hasMany("\App\Models\ForceManagment");
    }
}
