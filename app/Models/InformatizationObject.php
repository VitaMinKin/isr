<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformatizationObject extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "category",
        "force_managment_id",
        "type"
    ];

    public function forceManagment()
    {
        $this->belongsTo("\App\Models\ForceManagment");
    }
}
