<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisitDisease extends Model
{
    use HasFactory;
    protected $table = 'patients_visit_diseases';
    public $timestamps = false;
    protected $fillable = [
        'patient_visit_id',
        'disease_id'
        
    ];
}
