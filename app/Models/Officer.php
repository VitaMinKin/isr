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

    public function militaryRank()
    {
        return $this->belongsTo(MilitaryRank::class, 'military_rank');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'responsibles')->withPivot('order_id');
    }
}
