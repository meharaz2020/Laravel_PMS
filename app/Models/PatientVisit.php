<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVisit extends Model
{
    use HasFactory;
    protected $table = 'patients_visit';
    public $timestamps = false;
    protected $fillable = [
        'patient_id',
        'visit_date',
        'bp',
        'weight',
        'last_visit'
    ];
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
