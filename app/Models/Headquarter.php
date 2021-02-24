<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    use HasFactory;

    public function officers()
    {
        return $this->belongsToMany(Officer::class, 'responsibles')->withPivot('order_id');
    }
}