<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTest extends Model
{
    use HasFactory;
    protected $table = 'patient_visit_tests';
    public $timestamps = false;
    protected $fillable = [
        'patient_visit_id',
        'lab_test' 
    ];
}
