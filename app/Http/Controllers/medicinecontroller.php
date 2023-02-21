<?php

namespace App\Http\Controllers;

use App\Models\Lab_test;
use App\Models\Medicine;
use App\Models\MedicineDetail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class medicinecontroller extends Controller
{
    public function medicine(){
        $allmedicine = Medicine::orderBy('medicine_name')->get();

        return view('medicine.index',compact('allmedicine'));
    }
    public function medicine_save(Request $request){
        $data = $this->validateDisease();

        try {
            DB::beginTransaction();
            Medicine::create($data);
            DB::commit();
            $message = 'Medicine saved';
        } catch (QueryException $ex) {
            DB::rollBack();
            dd($ex);
        }
        return redirect()->back()->with('message', $message);
    }
    private function validateDisease()
    {
        return request()->validate([
            'medicine_name' => ['required', 'min:3', 'max:30']
        ]);
    }




    public function test(){
        $alltest = Lab_test::orderBy('test_name')->get();

        return view('test.index',compact('alltest'));
    }
    public function test_save(Request $request){
        $data = $this->validatetest();

        try {
            DB::beginTransaction();
            Lab_test::create($data);
            DB::commit();
            $message = 'Test saved';
        } catch (QueryException $ex) {
            DB::rollBack();
            dd($ex);
        }
        return redirect()->back()->with('message', $message);
    }
    private function validatetest()
    {
        return request()->validate([
            'test_name' => ['required', 'min:3', 'max:30']
        ]);
    }

    public function medicine_details(){
        $allmedicine = Medicine::orderBy('medicine_name')->get();
        $allmedicine_details = MedicineDetail::orderBy('packing')->get();

        return view('medicine.medicine_details',compact('allmedicine','allmedicine_details'));
    }
    public function medicine_details_save(Request $request){
        $data = $this->validmedicine_details();

        try {
            DB::beginTransaction();
            MedicineDetail::create($data);
            DB::commit();
            $message = 'Medicine Details saved';
        } catch (QueryException $ex) {
            DB::rollBack();
            dd($ex);
        }
        return redirect()->back()->with('message', $message);
    }
    private function validmedicine_details()
    {
        return request()->validate([
            'medicine_id' => ['required'],
            'packing' => ['required']
        ]);
    }
}
