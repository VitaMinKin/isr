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
        $this->belongsTo('\App\Models\Ranks', 'military_rank');
    }

    public function forceManagments()
    {
        $this->hasMany("\App\Models\ForceManagment");
    }
}
