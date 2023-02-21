<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisitMedication extends Model
{
    use HasFactory;
    protected $table = 'patients_visit_medications';
    public $timestamps = false;
    protected $fillable = [
        'patient_visit_id',
        'medicine_detail_id',
        'quantity',
        'dosage'
        
    ];
}
