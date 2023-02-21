<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class ModelTestingController extends Controller
{
    public function testMedicine(){
        $records=Medicine::find(1);
        dump($records);
        $records=Medicine::find(1)->medicineDetail;
        dump($records);
        dd('data saved');
    }
}
