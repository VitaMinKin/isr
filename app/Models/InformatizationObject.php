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
        "type",
        "department_id"
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function documents()
    {
        return $this->hasMany(ObjectDocument::class);
    }
}
