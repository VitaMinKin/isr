<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'subordination'
    ];

    public function officers()
    {
        return $this->belongsToMany(Officer::class, 'responsibles')->withPivot('order_id');
    }

    public function informatizationObjects()
    {
        return $this->hasMany(InformatizationObject::class);
    }
}
