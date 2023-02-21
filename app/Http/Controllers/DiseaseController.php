<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Doctrine\DBAL\Query\QueryException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Expression;

class DiseaseController extends Controller
{
    public function disease()
    {
        $alldisease = Disease::orderBy('disease_name')->get();

        return view('Disease.disease', compact('alldisease'));
    }
    public function disease_save(Request $request)
    {
        $data = $this->validateDisease();
        try {
            DB::beginTransaction();
            Disease::create($data);
            DB::commit();
            $message = 'Disease saved';
        } catch (QueryException $ex) {
            DB::rollBack();
            dd($ex);
        }
        return redirect()->back()->with('message', $message);
    }
    private function validateDisease()
    {
        return request()->validate([
            'disease_name' => ['required', 'min:3', 'max:30']
        ]);
    }

    public function disease_edit($id)
    {
        $disease_view = Disease::where('id', $id)->first();
        return view('disease.disease_edit',compact('disease_view'));
    }
    public function disease_edit_id(Request $request, $id)
    {
        $disease_update_view = Disease::where('id', $id)->first();
        if ($disease_update_view) {
            $disease_update_view->disease_name=$request->disease_name;
            $disease_update_view->update();
            return redirect('Disease.disease');

        }
     }
   
}
