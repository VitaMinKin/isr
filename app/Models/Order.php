<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'date',
        'title',
        'file_name',
        'file_path'
    ];

    public function responsibles()
    {
        return $this->hasMany(Responsible::class);
    }
}
