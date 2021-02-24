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
        'military_position',
        'information_security'
    ];

    public function militaryRanks()
    {
        return $this->belongsTo(MilitaryRank::class, 'military_rank');
    }

    public function headquarters()
    {
        return $this->belongsToMany(Headquarter::class, 'responsibles')->withPivot('order_id');
    }
}
