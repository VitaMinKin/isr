<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForceManagment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'officer_id'
    ];

    public function officer()
    {
        $this->belongsTo("\App\Models\Officer");
    }

    public function informatizationObjects()
    {
        $this->hasMany("\App\Models\InformatizationObject");
    }
}
