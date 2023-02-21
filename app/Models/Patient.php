<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    public $timestamps = false;
    protected $fillable = [
        'patient_name',
        'date_of_birth',
        'gender',
        'phone_number'
    ];
    public function patientVisits(){
        return $this->hasMany(PatientVisit::class);
    }
}
