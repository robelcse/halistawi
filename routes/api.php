<?php

use App\Http\Controllers\Aide\AideController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Patient\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Tester\TesterController;
use App\Http\Controllers\TeststationController;

use App\Http\Controllers\TestdeviceController;
use App\Http\Controllers\PpbagentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\DependentController as DependentController2;

use App\Http\Controllers\Dependent\DependentController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

/**
 * 
 * All of the API route
 * 
 */


//aide authentication
Route::post('/aide/register', [AuthController::class, 'aideRegister']);  
Route::post('/aide/login', [AuthController::class, 'aideLogin']); 

//patient authentication
Route::post('/patient/register', [AuthController::class, 'patientRegister']); 
Route::post('/patient/login', [AuthController::class, 'patientLogin']); 

//protected route
Route::group(['middleware' => ['auth:sanctum']], function () {

    //user logout
    Route::post('/logout', [AuthController::class, 'logout']); 

    //aide module
   // Route::post('/aide/checkin/{national_id}', [PatientController::class, 'checkin']); 
    Route::get('/aide/checkin/{national_id}', [AideController::class, 'getAllDependent']); 
    Route::post('/aide/checkin/{national_id}/dependent/{dependent_id}', [AideController::class, 'checkinDependent']); 
    //last modified api
    Route::post('/aide/{national_id}/dependent/add', [DependentController::class, 'addDependentByAide']); 


    //doctor module
    Route::get('/doctor/patients', [DoctorController::class, 'getAllPatients']);  
    Route::get('/doctor/patients/pending', [DoctorController::class, 'pendingPatients']);   
    Route::get('/doctor/patients/pending/{national_id}', [DoctorController::class, 'checkedinPatient']);  
    Route::get('/doctor/patients/{patient_id}/records', [DoctorController::class, 'recordsOfPatient']);  
    Route::get('/doctor/patients/{patient_id}/records/{record_id}', [DoctorController::class, 'singleRecordOfPatient']);  
    Route::post('/doctor/patients/{patient_id}/prescribe', [DoctorController::class, 'prescribe']);  

    Route::post('/doctor/patients/{patient_id}/refer', [DoctorController::class, 'refer']);  
    Route::post('/doctor/patients/{patient_id}/test', [TesterController::class, 'testInsert']);  

    //patients module
    Route::post('/patient/appoinment', [PatientController::class, 'setAppoinment']);  
    Route::get('/patient/appointments', [PatientController::class, 'allAppoinmentOfPatient']);  
    Route::get('/patient/appointments/{appoinment_id}', [PatientController::class, 'singleAppoinmentOfPatient']);  
    Route::post('/patient/dependent/add', [PatientController::class, 'store']);  
    Route::get('/patient/tests', [PatientController::class, 'allTestsOfPatient']);  
    Route::get('/patient/tests/{test_id}', [PatientController::class, 'singleTestOfPatient']);  
    Route::get('/patient/prescriptions', [PatientController::class, 'prescriptionsOfPatient']);  
    Route::get('/patient/prescriptions/{prescription_id}', [PatientController::class, 'singlePrescriptionOfPatient']);   
    /// Route::get('/patient/tests/result', [PatientController::class, 'resultOfTest']); 

    //last modified api

    Route::post('/patient/{national_aide}/checkin', [PatientController::class, 'patient_checkin']);  

    Route::get('/patient/dependent', [DependentController2::class, 'listOfPatientWithDependents']);  
    Route::get('/patient/dependent/{national_id}', [DependentController2::class, 'singlePatientWithDependents']);  

    //Test station module
    Route::post('/teststation/create', [TeststationController::class, 'store']); 
    Route::get('/teststation/show', [TeststationController::class, 'listOfStationWithDevices']); 
    Route::get('/teststation/show/{teststation_id}', [TeststationController::class, 'singleStationWithDevices']); 

    //test devices module
    Route::post('/testsdevice/create', [TestdeviceController::class, 'store']); 
    Route::get('/testsdevice/show', [TestdeviceController::class, 'getAlldevicesWithTeststation']); 
    Route::get('/testsdevice/show/{testdevice_id}', [TestdeviceController::class, 'getSingledeviceWithTeststation']); 




});


//get all gps pin to show pin in google maps for dashboard
Route::get('/allgpspin', function(){

    $all_gps_pin =  DB::table('teststations')->select('gps_pin','location')->get();
    return response()->json([
        'status'=>'success',
        'status_code'=>200,
        'data'=>$all_gps_pin
    ]);
});