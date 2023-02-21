<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\medicinecontroller;
use App\Http\Controllers\ModelTestingController;
use App\Http\Controllers\PatirntController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}) ;
// Route::get('/testMedicine',[ModelTestingController::class,'testMedicine'])->name('test.medicine');
// Route::get('/testDisease',[ModelTestingController::class,'testAddDisease'])->name('test.add.disease');
// Route::get('/getAllDiseases',[ModelTestingController::class,'getAllDiseases']);

Route::get('/Dashboard',[DashboardController::class,'index']);
Route::get('/register',[PatirntController::class,'register']);
Route::get('/pmedicine',[PatirntController::class,'pmedicine']);
Route::get('/p_prescription',[PatirntController::class,'p_prescription']);
Route::get('/disease',[DiseaseController::class,'disease']);
Route::post('/disease_save',[DiseaseController::class,'disease_save']);
Route::get('/disease_edit/{id}',[DiseaseController::class,'disease_edit']);
Route::post('/disease_edit_id/{id}',[DiseaseController::class,'disease_edit_id']);





Route::post('/patient_save',[PatirntController::class,'patient_save']);
Route::get('/patient_edit/{id}',[PatirntController::class,'patient_edit']);
Route::post('/patient_edit_id/{id}',[PatirntController::class,'patient_edit_id']);



Route::get('/medicine',[medicinecontroller::class,'medicine']);
Route::post('/medicine_save',[medicinecontroller::class,'medicine_save']);



Route::get('/test',[medicinecontroller::class,'test']);
Route::post('/test_save',[medicinecontroller::class,'test_save']);



Route::get('/medicine_details',[medicinecontroller::class,'medicine_details']);
Route::post('/medicine_details_save',[medicinecontroller::class,'medicine_details_save']);

 

Route::get('/get_medicine_packing',[PatirntController::class,'get_medicine_packing'])->name('get_medicine_packing');
Route::post('/save_prescription',[PatirntController::class,'save_prescription'])->name('save_prescription');;
Route::get('/updateprescription/{id}/{vid}',[PatirntController::class,'updateprescription'])->name('updateprescription');;
Route::post('/update_prescription/{id}',[PatirntController::class,'update_prescription'])->name('update_prescription');;


