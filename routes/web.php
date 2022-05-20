<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\PpbagentController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmergencyContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordresetController;
use App\Http\Controllers\TstationController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Doctor\DoctorController;



//login route
Route::get('/login', [LoginController::class, 'login_page'])->name('login_page');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//password reset
Route::get('/password-reset', [PasswordresetController::class, 'reset_link_page'])->name('reset_link_page');
Route::post('/password-reset', [PasswordresetController::class, 'send_reset_link'])->name('send_reset_link');
Route::get('/password/reset', [PasswordresetController::class, 'password_reset_page'])->name('password_reset_page');
Route::post('/reset/password', [PasswordresetController::class, 'password_reset'])->name('password_reset');

//register route

Route::get('/register', [RegisterController::class, 'register_page'])->name('register_page');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/', function () {
    return redirect('login');
});

//admin dashboard route
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //ppb agent create and store
    Route::get('/ppbagent', [PpbagentController::class, 'index'])->name('ppbagent.index');
    Route::get('/ppbagent/create', [PpbagentController::class, 'create'])->name('ppbagent.create');
    Route::post('/ppbagent/store', [PpbagentController::class, 'store'])->name('ppbagent.store');
    Route::get('/ppbagent/{ppbagent_id}/edit', [PpbagentController::class, 'edit'])->name('ppbagent.edit');
    Route::post('/ppbagent/{ppbagent_id}/update', [PpbagentController::class, 'update'])->name('ppbagent.update');
    Route::post('/ppbagent/{ppbagent_id}/delete', [PpbagentController::class, 'destroy'])->name('ppbagent.destroy');

    //company crate and store
    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/company/{company_id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/company/{company_id}/update', [CompanyController::class, 'update'])->name('company.update');
    Route::post('/company/{company_id}/delete', [CompanyController::class, 'destroy'])->name('company.destroy');

    //individual create and store
    Route::get('/individual', [IndividualController::class, 'index'])->name('individual.index');
    Route::get('/individual/create', [IndividualController::class, 'create'])->name('individual.create');
    Route::get('/individual/{individual_id}/edit', [IndividualController::class, 'edit'])->name('individual.edit');
    Route::post('/individual/{individual_id}/update', [IndividualController::class, 'update'])->name('individual.update');
    Route::post('/individual/{individual_id}/delete', [IndividualController::class, 'destroy'])->name('individual.destroy');
    Route::post('/individual/store', [IndividualController::class, 'store'])->name('individual.store');

    // device information CRUD
    Route::get('/device', [DeviceController::class, 'index'])->name('device.index');
    Route::get('/device/create', [DeviceController::class, 'create'])->name('device.create');
    Route::post('/device/store', [DeviceController::class, 'store'])->name('device.store');
    Route::get('/device/{device_id}/edit', [DeviceController::class, 'edit'])->name('device.edit');
    Route::get('/device/{device_id}', [DeviceController::class, 'show'])->name('device.show');
    Route::post('/device/{device_id}/update', [DeviceController::class, 'update'])->name('device.update');
    Route::post('/device/{device_id}/delete', [DeviceController::class, 'destroy'])->name('device.destroy');

    // emergency contact CRUD
    Route::get('/emergency-contact', [EmergencyContactController::class, 'index'])->name('emergency-contact.index');
    Route::get('/emergency-contact/create', [EmergencyContactController::class, 'create'])->name('emergency-contact.create');
    Route::post('/emergency-contact/store', [EmergencyContactController::class, 'store'])->name('emergency-contact.store');

    Route::get('/emergency-contact/{emergency_id}/edit', [EmergencyContactController::class, 'edit'])->name('emergency-contact.edit');
    Route::post('/emergency-contact/{emergency_id}/update', [EmergencyContactController::class, 'update'])->name('emergency-contact.update');
    Route::post('/emergency-contact/{emergency_id}/delete', [EmergencyContactController::class, 'destroy'])->name('emergency-contact.destroy');
    //test station create,read,update and delete

    Route::resource('tstation', TstationController::class);

    //dependency dropdown
    Route::get('/tstation/sub-counties/{county_id}', function ($county_id) {

        return $all_sub_country = DB::table('sub_counties')->where('county_code', $county_id)->get();
    });

    Route::get('/tstation/words/{sub_county_code}', function ($sub_county_code) {

        return $all_sub_county_code = DB::table('wards')->where('sub_county_code', $sub_county_code)->get();
    });

    //dropdown and count station and device
    Route::get('/tstation-count/sub-counties/{county_id}/{country_name}', function ($county_id, $country_name) {

        $c_t_station = DB::table('teststations')->where('country', $country_name)->count();
        $all_sub_country = DB::table('sub_counties')->where('county_code', $county_id)->get();
        $c_ind = DB::table('individuals')->where('country', $country_name)->count();
        $c_com = DB::table('companies')->where('country', $country_name)->count();
        $total_device = $c_ind + $c_com;
        return json_encode(["c_t_station" => $c_t_station, "all_sub_country" => $all_sub_country,'total_device'=>$total_device]);
    });

    Route::get('/tstation-count/words/{sub_county_code}/{sub_county_name}', function ($sub_county_code, $sub_county_name) {
        $c_t_station = DB::table('teststations')->where('sub_country', $sub_county_name)->count();
        $all_sub_county_code = DB::table('wards')->where('sub_county_code', $sub_county_code)->get();


        $c_ind = DB::table('individuals')->where('sub_country', $sub_county_name)->count();
        $c_com = DB::table('companies')->where('sub_country', $sub_county_name)->count();
        $total_device = $c_ind + $c_com;


        return json_encode(["c_t_station" => $c_t_station, "all_sub_county_code" => $all_sub_county_code,'total_device'=>$total_device]);
    });

    Route::get('/tstation-count/words-count/{wv}', function ($wv) {
        $c_t_station = DB::table('teststations')->where('words', $wv)->count();

        $c_ind = DB::table('individuals')->where('city', $wv)->count();
        $c_com = DB::table('companies')->where('city', $wv)->count();
        $total_device = $c_ind + $c_com;

        return json_encode(["c_t_station" => $c_t_station,'total_device'=>$total_device]);
    });

    //patient route
    Route::get('/patient', [PatientController::class, 'patient_list'])->name('patient.list');
    Route::get('/patient/{patient_id}/edit', [PatientController::class, 'patient_edit'])->name('patient.edit');
    Route::post('/patient/{patient_id}/update', [PatientController::class, 'patient_update'])->name('patient.update');
    Route::delete('/patient/{patient_id}/delete', [PatientController::class, 'patient_delete'])->name('patient.delete');

    //doctor
    Route::get('/doctor', [DoctorController::class, 'doctor_list'])->name('doctor.list');
    Route::get('/doctor/{doctor_id}/edit', [DoctorController::class, 'doctor_edit'])->name('doctor.edit');
    Route::post('/doctor/{doctor_id}/update', [DoctorController::class, 'doctor_update'])->name('doctor.update');
    Route::delete('/doctor/{doctor_id}/delete', [DoctorController::class, 'doctor_delete'])->name('doctor.delete');


    //admin route

    Route::resource('admin', AdminController::class);

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


