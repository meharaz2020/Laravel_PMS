<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Lab_test;
use App\Models\Medicine;
use App\Models\MedicineDetail;
use App\Models\Patient;
use App\Models\PatientTest;
use App\Models\PatientVisit;
use App\Models\PatientVisitDisease;
use App\Models\PatientVisitMedication;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatirntController extends Controller
{
    public function register()
    {
        $patient_view = Patient::all();
        return view('patient.register', compact('patient_view'));
    }
    public function patient_save(Request $request)
    {
        $patient_view = new Patient;
        try {
            $patient_view->patient_name = $request->patient_name;
            $patient_view->date_of_birth = $request->date_of_birth;
            $patient_view->gender = $request->gender;
            $patient_view->phone_number = $request->phone_number;
            $patient_view->save();
        } catch (QueryException $ex) {
            DB::rollBack();
            dd($ex);
        }
        return redirect()->back();
    }

    public function patient_edit($id)
    {
        $patient_view = Patient::where('id', $id)->first();
        return view('patient.patient_edit', compact('patient_view'));
    }

    public function patient_edit_id(Request $request, $id)
    {
        $patient_view_update = Patient::where('id', $id)->first();
        if ($patient_view_update) {
            $patient_view_update->patient_name = $request->patient_name;
            $patient_view_update->date_of_birth = $request->date_of_birth;
            $patient_view_update->gender = $request->gender;
            $patient_view_update->phone_number = $request->phone_number;
            $patient_view_update->update();
            return redirect('register');
        }
    }
    public function pmedicine()
    {
        $patientVisit = PatientVisit::orderBy('patient_id')->get();

        return view('patient.pmedicine',compact('patientVisit'));
    }
    public function updateprescription(  $id,$vid)
    {
        $allvisit = DB::table('patients_visit')->where('patient_id', '=', $id)  ->get();
       
        // $allvisit=PatientVisit::orderBy('patient_id')->get();
        $allpatient = Patient::orderBy('patient_name')->get();
        $allmedicine = Medicine::orderBy('medicine_name')->get();
        $alldisease = Disease::orderBy('disease_name')->get();
        $alltest = Lab_test::orderBy('test_name')->get();
        $patientVisitId=$vid;
        // dd($patientVisitId);
        $queryVisitdisease="SELECT d.disease_name,pvd.disease_id from disease as d, patients_visit_diseases as pvd where pvd.patient_visit_id=$patientVisitId and pvd.disease_id=d.id;";
        $visitDisease=DB::select($queryVisitdisease);
         $patiendvisitTest="SELECT lt.test_name,pt.patient_visit_id,pt.lab_test,pt.lab_test from lab_test as lt, patient_visit_tests as pt WHERE pt.patient_visit_id=$patientVisitId and pt.lab_test=lt.id;";
         $visittest=DB::select($patiendvisitTest);

         return view('patient.edit_prescription', compact('patientVisitId','visittest','allvisit','allpatient', 'allmedicine', 'alldisease', 'alltest','visitDisease') );      
         
    }
    public function p_prescription()
    {
        $allpatient = Patient::orderBy('patient_name')->get();
        $allmedicine = Medicine::orderBy('medicine_name')->get();
        $alldisease = Disease::orderBy('disease_name')->get();
        $alltest = Lab_test::orderBy('test_name')->get();

        return view('patient.p_prescription', compact('allpatient', 'allmedicine', 'alldisease', 'alltest'));
    }

    public function get_medicine_packing()
    {
        $medicineId = request()->medicine_id;
        $packing = MedicineDetail::where('medicine_id', '=', $medicineId)->get();
        $option = '<option value="">Select Packing</option>';
        foreach ($packing as $p) {
            $option = $option . '<option value="' . $p->id . '">' . $p->packing . '</option>';
        }
        return $option;
    }


    public function save_prescription(Request $request)
    {
        $visit_date = $request->visit_date;
        $next_visit_date = $request->next_visit_date;


        $patient_id = $request->patient_id;
        $bp = $request->bp;
        $patient_weight = $request->patient_weight;

        $medicine_detail_ids = $request->medicine_detail_ids;
        $quantities = $request->quantities;
        $dosages = $request->dosages;
        $diseases = $request->diseases;
        $testId = $request->testId;
        $results = $request->results;

        $data = array('patient_id' => $patient_id, 'visit_date' => $visit_date, 'bp' => $bp, 'weight' => $patient_weight, 'last_visit' => $next_visit_date);


        try {
            DB::beginTransaction();
            $patientvisit = PatientVisit::create($data);
            $patiendVisitId = $patientvisit->id;


            $size = sizeof($diseases);
            for ($i = 0; $i < $size; $i++) {
                $diseaseData = array(
                    'patient_visit_id' => $patiendVisitId,
                    'disease_id' => $diseases[$i]
                );
                PatientVisitDisease::create($diseaseData);
            }


            $size = sizeof($testId);
            for ($i = 0; $i < $size; $i++) {
                $visitData = array(
                    'patient_visit_id' => $patiendVisitId,
                    'lab_test' => $testId[$i]
                );
                PatientTest::create($visitData);
            }


            $size = sizeof($medicine_detail_ids);
            for ($i = 0; $i < $size; $i++) {
                $medicineData = array(
                    'patient_visit_id' => $patiendVisitId,
                    'medicine_detail_id' => $medicine_detail_ids[$i],
                    'quantity' => $quantities[$i],
                    'dosage' => $dosages[$i],
                );
                PatientVisitMedication::create($medicineData);
            }



            DB::commit();
            $message = 'Disease saved';
        } catch (QueryException $ex) {
            DB::rollBack();
            dd($ex);
        }
        return redirect()->back()->with('message', $message);
    }

    public function update_prescription(Request $request, $id){
        $visit_date = $request->visit_date;
        $next_visit_date = $request->next_visit_date;


        $patient_id = $request->patient_id;
        $bp = $request->bp;
        $patient_weight = $request->patient_weight;

        $medicine_detail_ids = $request->medicine_detail_ids;
        $quantities = $request->quantities;
        $dosages = $request->dosages;
        $diseases = $request->diseases;
        $testId = $request->testId;
        $results = $request->results;

        $data = array('patient_id' => $patient_id, 'visit_date' => $visit_date, 'bp' => $bp, 'weight' => $patient_weight, 'last_visit' => $next_visit_date);


        try {
            DB::beginTransaction();
            $patientvisit = PatientVisit::create($data);
            $patiendVisitId = $patientvisit->id;
            

            dd($id);
            $patientVisitdisease = PatientVisitDisease::where('patient_visit_id', '=', $id)->delete();
            $patientVisitTest = PatientTest::where('patient_visit_id', '=', $id)->delete();

            $patientVisitmedicine = PatientVisitMedication::where('patient_visit_id', '=', $id)->delete();
            $patientVisi = PatientVisit::where('id', '=', $id)->delete();
 
            $size = sizeof($diseases);
            for ($i = 0; $i < $size; $i++) {
                $diseaseData = array(
                    'patient_visit_id' => $patiendVisitId,
                    'disease_id' => $diseases[$i]
                );
                PatientVisitDisease::create($diseaseData);
            }


            $size = sizeof($testId);
            for ($i = 0; $i < $size; $i++) {
                $visitData = array(
                    'patient_visit_id' => $patiendVisitId,
                    'lab_test' => $testId[$i]
                );
                PatientTest::create($visitData);
            }


            $size = sizeof($medicine_detail_ids);
            for ($i = 0; $i < $size; $i++) {
                $medicineData = array(
                    'patient_visit_id' => $patiendVisitId,
                    'medicine_detail_id' => $medicine_detail_ids[$i],
                    'quantity' => $quantities[$i],
                    'dosage' => $dosages[$i],
                );
                PatientVisitMedication::create($medicineData);
            }



            DB::commit();
             $message = 'Update saved';
        } catch (QueryException $ex) {
            DB::rollBack();
            dd($ex);
        }
        return redirect()->back()->with('message', $message);
    }
}
