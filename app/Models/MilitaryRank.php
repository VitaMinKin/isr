<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilitaryRank extends Model
{
    use HasFactory;

    public function officers()
    {
        $this->hasMany("\App\Models\Officer", "military_rank");
    }

    
}
