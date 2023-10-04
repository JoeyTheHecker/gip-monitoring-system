<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Applicant;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'effective_start_date',
        'effective_end_date',
        'diff_days',
        'status',
        'office_place_assignment',
        'work_contract_person',
    ];

    public function applicant(){
        return $this->belongsTo(Applicant::class);
    }
}
