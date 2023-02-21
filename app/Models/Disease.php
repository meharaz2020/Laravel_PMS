<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;
    protected $table = 'disease';
    public $timestamps = false;
    protected $fillable = [
        'disease_name'
    ];
}
