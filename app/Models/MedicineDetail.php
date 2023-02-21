<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineDetail extends Model
{
    use HasFactory;
    protected $table = 'medicines_details';
    public $timestamps = false;
    
    protected $fillable=[
        'medicine_id',
        'packing'
    ];

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}
