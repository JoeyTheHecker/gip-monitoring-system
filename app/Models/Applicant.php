<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contract;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_code',
        'applicant_first_name',
        'applicant_middle_name',
        'applicant_last_name',
        'profile_picture',
        'residential_address',
        'telephone_number',
        'mobile_number',
        'email',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'civil_status',
    ];

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

}
