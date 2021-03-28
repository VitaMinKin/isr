<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ObjectDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_name_id',
        'preliminary_accounting',
        'number_type',
        'number',
        'number_mil_unit',
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

    public function calculateDateLimit()
    {
        if (!$this->date) {
            return false;
        }

        $limitCategory = [
            '1' => 'limit_1_c',
            '2' => 'limit_2_c',
            '3' => 'limit_3_c'
        ];

        $objectCategory = $this->informatizationObject->category;
        $documentValidityCategory = $limitCategory[$objectCategory];
        $limitation = $this->documentName->$documentValidityCategory;

        if (!$limitation) {
            return false;
        }

        $validDates = Carbon::create($this->date)->addYear($limitation);
        $this->validity = $validDates;
        return $validDates;
    }
}
