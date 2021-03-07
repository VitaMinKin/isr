<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_name_id',
        'preliminary_accounting',
        'number',
        'date',
        'comment'
    ];

    public function documentName()
    {
        return $this->belongsTo(DocumentName::class);
    }

    public function informatizationObject()
    {
        return $this->belongsTo(InformatizationObject::class);
    }
}
