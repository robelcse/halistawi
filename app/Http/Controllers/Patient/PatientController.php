<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Checkin;
use App\Models\Dependent;
use App\Models\Test;
use App\Models\Record;
use App\Models\User;
use App\repositories\PatientRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;



class PatientController extends Controller
{


    public $patientRepository;

    /**
     * 
     * constructor method
     * 
     * @return instance of PatientRepository class 
     * 
     */

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * 
     * it will call when need to return json success object
     * 
     * @param Object $data
     *  
     * @return json Object
     * 
     */

    protected function jsonSuccess($data)
    {
        return response()->json([
            'status'      => 'success',
            'status_code' => 200,
            'data'        => $data
        ]);
    }

    /**
     * 
     * it will call when need to return json error object
     *  
     * @return json Object
     * 
     */

    protected function jsonError()
    {
        return response()->json([
            'status'      => 'fail',
            'status_code' => 400,
            'data'        => []
        ]);
    }

    /*
    * display a listing of the resource
    *
    *@return Illuminate\Http\Response
    *
    */

    // public function index()
    // {

    //     $patients = $this->patientRepository->getAll();

    //     if (!is_null($patients)) {

    //         return response()->json([
    //             'status' => 'success',
    //             'status_code' => '200',
    //             'data'    => $patients
    //         ]);
    //     } else {

    //         return response()->json([
    //             'status' => 'fail',
    //             'status_code' => '400',
    //             'message' => 'patients not found',
    //             'data'    => []
    //         ]);
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //add dependency or family member 
    public function store(Request $request)
    {

        $request->validate([
            'name'          => 'required|string',
            'date_of_birth' => 'required',
            'relation'      => 'required'
        ]);

        $dependent_existing_check = Dependent::where([

            'name'          => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'relation'      => $request->relation,
            'national_id'   => Auth::user()->national_id
        ])->first();


        if (is_null($dependent_existing_check)) {

            $family                = new Dependent();
            $family->name          = $request->name;
            $family->date_of_birth = $request->date_of_birth;
            $family->gender        = $request->gender;
            $family->national_id   = Auth::user()->national_id;
            $family->mobile_number = $request->mobile_number;
            $family->email         = $request->email;
            $family->photo         = $request->photo;
            $family->relation      = $request->relation;
            $family->save();

            if (!is_null($family)) {
                return response()->json([

                    'status'      => 'success',
                    'status_code' => 200,
                    'data'        => $family
                ]);
            } else {

                return response()->json([

                    'status'      => 'fail',
                    'status_code' => 400,
                    'data'        => []
                ]);
            }
        } else {

            return response()->json([
                'status'      => 'fail',
                'status_code' => 400,
                'message'     => 'dependent already exist!'
            ]);
        }
    }

    /**
     * update() patient by id
     *
     * @param Request $request
     * @param integer $id
     * @return response
     */
    public function update(Request $request, $id)
    {
        $patient = $this->patientRepository->findById($id);
        if (is_null($patient)) {
            return response()->json([
                'status'      => 'fail',
                'status_code' => '400',
                'data'        => null,
            ]);
        }


        $patient = $this->patientRepository->edit($request, $id);

        return response()->json([
            'status'      => 'success',
            'status_code' => '400',
            'data'        => $patient
        ]);
    }

    /**
     * destry() Delete a patient
     *
     * @param integer $id
     * @return response
     */
    public function destroy($id)
    {
        $patient = $this->patientRepository->findById($id);
        if (is_null($patient)) {
            return response()->json([
                'status'      => 'fail',
                'status_code' => '400',
                'data'        => null,
            ]);
        }

        $patient = $this->patientRepository->delete($id);
        return response()->json([
            'status'      => 'success',
            'status_code' => '400',
            'data'        => $patient
        ]);
    }


    /**
     * checkin() a patient
     *
     * @param integer $id, Request $request
     * @return response
     */

    public function checkin(Request $request, $national_id)
    {

        $patient = Patient::where('national_id', $national_id)->first();
        if (!is_null($patient)) {

            //check if exist checkin today
            $existing_checkin = Checkin::orderBy('checkin_id', 'DESC')->where('national_id', $national_id)->first();

            if ($existing_checkin != NULL) {
                //current data and existing date
                $current_date  = Carbon::now()->format('d-m-Y');
                $existing_date = $existing_checkin->created_at->format('d-m-Y');
                if ($current_date == $existing_date) {

                    return response()->json([

                        'status'      => 'fail',
                        'status_code' => 400,
                        'message'     => 'already checkin today',
                        'data'        => []
                    ]);
                } else {

                    $checkin                  = new Checkin();
                    $checkin->national_id     = $national_id;
                    $checkin->doctor_id       = $request->doctor_id;
                    $checkin->checked_in_time = Carbon::now()->format('d-m-Y');
                    $checkin->save();

                    return response()->json([
                        'status'      => 'success',
                        'status_code' => 200,
                        'data'        => $checkin
                    ]);
                }
            } else {
                $checkin                  = new Checkin();
                $checkin->national_id     = $national_id;
                $checkin->doctor_id       = $request->doctor_id;
                $checkin->checked_in_time = Carbon::now()->format('d-m-Y');
                $checkin->save();

                return response()->json([
                    'status'      => 'success',
                    'status_code' => 200,
                    'data'        => $checkin
                ]);
            }
        } else {

            return response()->json([

                'status'      => 'fail',
                'status_code' => 400,
                'data'        => []
            ]);
        }
    }



    public function singleRecordOfPatient($patient_id, $record_id)
    {
        $patient = Patient::where('patient_id', $patient_id)->first();

        if (!is_null($patient)) {

            $single_record_of_patient = Record::where('patient_id', $patient_id)->where('record_id', $record_id)->first();

            if (!is_null($single_record_of_patient)) {


                $patient = Patient::where('patient_id', $patient_id)->first();

                return response()->json([

                    'status'      => 'success',
                    'status_code' => '200',
                    'patient_id'  => $patient_id,
                    'full_name'   => $patient->full_name,
                    'photo'       => $patient->photo,
                    'email'       => $patient->email_address,
                    'phone'       => $patient->mobile_number,
                    'medecine'    => $single_record_of_patient->medicine,
                    'notes'       => $single_record_of_patient->notes
                ]);
            } else {

                return response()->json([

                    'status'      => 'fail',
                    'status_code' => '400',
                    'data'        => []
                ]);
            }
        } else {

            return response()->json([

                'status'      => 'fail',
                'status_code' => '400',
                'data'        => []
            ]);
        }
    }

    //all tests of patient
    public function allTestsOfPatient()
    {


        $patient              = Patient::where('email', Auth::user()->email)->first();
        $all_tests_of_patient = Test::where('patient_id', $patient->patient_id)->get();

        if (count($all_tests_of_patient) != 0) {

            return response()->json([
                'status'      => 'success',
                'status_code' => 200,
                'data'        => $all_tests_of_patient
            ]);
        } else {

            return response()->json([
                'status'      => 'fail',
                'status_code' => 400,
                'data'        => []
            ]);
        }
    }

    //single test of patient
    public function singleTestOfPatient($test_id)
    {

        $testId = Test::where('test_id', $test_id)->first();

        if (!is_null($testId)) {

            $patient     = Patient::where('email', Auth::user()->email)->first();
            $single_test = Test::where('patient_id', $patient->patient_id)->where('test_id', $testId->test_id)->first();

            if ($single_test != NULL) {

                return response()->json([
                    'status'      => 'success',
                    'status_code' => 200,
                    'data'        => $single_test
                ]);
            } else {

                return response()->json([
                    'status'      => 'fail',
                    'status_code' => 400,
                    'data'        => []
                ]);
            }
        } else {

            return response()->json([
                'status'      => 'fail',
                'status_code' => 400,
                'data'        => []
            ]);
        }
    }
    //result of sinlge test
    public function resultOfTest()
    {

        return "result of single test";
    }

    // all appoinment of patient
    public function allAppoinmentOfPatient()
    {


        $all_appoinment_of_patient = Appoinment::where('email', Auth::user()->email)->get();
        if (count($all_appoinment_of_patient) != 0) {
            return response()->json([

                'status'      => 'success',
                'status_code' => 200,
                'data'        => $all_appoinment_of_patient
            ]);
        } else {

            return response()->json([
                'status'      => 'fail',
                'status_code' => 400,
                'data'        => []
            ]);
        }
    }

    //set appoinment 

    public function setAppoinment(Request $request)
    {

        $request->validate([
            'appoinment_date' => 'required|date_format:d-m-Y h:i A'
        ]);


        $appoinment                  = new Appoinment();
        $appoinment->name            = Auth::user()->name;
        $appoinment->email           = Auth::user()->email;
        $appoinment->appoinment_date = $request->appoinment_date;
        $appoinment->save();

        if (!is_null($appoinment)) {

            return response()->json([

                'status'      => 'success',
                'status_code' => 200,
                'data'        => $appoinment
            ]);
        } else {

            return response()->json([

                'status'      => 'fail',
                'status_code' => 400,
                'data'        => []
            ]);
        }
    }


    //single appoinment of patient
    public function singleAppoinmentOfPatient($appoinment_id)
    {

        $single_appoinment_of_patient = Appoinment::where('email', Auth::user()->email)->where('appoinment_id', $appoinment_id)->first();
        if ($single_appoinment_of_patient != NULL) {

            return response()->json([
                'status'      => 'success',
                'status_code' => 200,
                'data'        => $single_appoinment_of_patient
            ]);
        } else {

            return response()->json([
                'status'      => 'fail',
                'status_code' => 400,
                'data'        => []
            ]);
        }
    }


    //prescriptions of patients
    public function prescriptionsOfPatient()
    {

        $patient_id    = Auth::user()->email;
        $prescriptions = Patient::with('records')->where('email', $patient_id)->get();
        if (count($prescriptions) != 0) {

            if (count($prescriptions) != 0) {
                return response()->json([

                    'status'      => 'success',
                    'status_code' => 200,
                    'data'        => $prescriptions
                ]);
            } else {
                return response()->json([

                    'status'      => 'fail',
                    'status_code' => 400,
                    'data'        => []
                ]);
            }
        } else {

            return response()->json([

                'status'      => 'fail',
                'status_code' => 400,
                'data'        => []
            ]);
        }
    }

    //single prescription of patient

    public function singlePrescriptionOfPatient($prescription_id)
    {

        $record = Record::where('record_id', $prescription_id)->first();

        if (!is_null($record)) {

            $patient      = Patient::where('email', Auth::user()->email)->first();
            $prescription = Record::where('patient_id', $patient->patient_id)->where('record_id', $prescription_id)->get();
            if (count($prescription) != 0) {

                return response()->json([

                    'status'      => 'success',
                    'status_code' => 200,
                    'data'        => $prescription
                ]);
            } else {

                return response()->json([

                    'status'      => 'fail',
                    'status_code' => 400,
                    'data'        => []
                ]);
            }
        } else {

            return response()->json([
                'status'      => 'fail',
                'status_code' => 400,
                'data'        => []
            ]);
        }
    }


    /**
     * 
     * patient_checkin method
     * 
     * @param $national_id
     * 
     * @return boolen json data
     * 
     */

    public function patient_checkin(Request $request, $national_id)
    {


        $patient = Patient::where('national_id', $national_id)->first();
        if (!is_null($patient)) {

            //check if exist checkin today
            $existing_checkin = Checkin::orderBy('checkin_id', 'DESC')->where('national_id', $national_id)->first();
            if ($existing_checkin != NULL) {
                //current data and existing date
                $current_date  = Carbon::now()->format('d-m-Y');
                $existing_date = $existing_checkin->created_at->format('d-m-Y');
                if ($current_date == $existing_date) {

                    return response()->json([

                        'status'      => 'fail',
                        'status_code' => 400,
                        'message'     => 'already checkin today',
                        'data'        => []
                    ]);
                } else {

                    $checkin                  = new Checkin();
                    $checkin->national_id     = $national_id;
                    $checkin->doctor_id       = $request->doctor_id;
                    $checkin->checked_in_time = Carbon::now()->format('d-m-Y');
                    $checkin->save();

                    return response()->json([
                        'status'      => 'success',
                        'status_code' => 200,
                        'data'        => $checkin
                    ]);
                }
            } else {
                $checkin                  = new Checkin();
                $checkin->national_id     = $national_id;
                $checkin->doctor_id       = $request->doctor_id;
                $checkin->checked_in_time = Carbon::now()->format('d-m-Y');
                $checkin->save();

                return response()->json([
                    'status'      => 'success',
                    'status_code' => 200,
                    'data'        => $checkin
                ]);
            }
        } else {

            return response()->json([

                'status'      => 'fail',
                'status_code' => 400,
                'data'        => []
            ]);
        }
    }

    /**
     * 
     * Display list of patients with his/her dependent
     * 
     * @return array[] of patient with his/her dependent
     * 
     */
    public function patient_list(Request $request)
    {

        $patients = Patient::with('dependents')->orderBy('patient_id', 'desc');
        $keyword = $request->q;
        if (!empty($keyword)) {
            $patients->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('gender', 'LIKE', '%' . $keyword . '%')
                ->orWhere('mobile_number', 'LIKE', '%' . $keyword . '%')
                ->orWhere('national_id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%');
        }

        $patients = $patients->paginate(12)->withQueryString();
        return view('admin.patients.index', ['title' => 'List of patients', 'patients' => $patients]);
    }

    /**
     * 
     * Show the form for editing the specific patient
     *
     *  @param int patient $id
     *
     *  @return \Illuminate\Http\Response
     */

    public function patient_edit($id)
    {

        $patient = Patient::find($id);
        return view('admin.patients.edit', ['title' => 'Update Patient', 'patient' => $patient]);
    }

    /**
     * 
     * Update a specific patient
     *
     * @param \Illuminate\Http\Request $request
     *
     * @paream patient $id
     *
     * @return \Illuminate\Http\Response 
     */


    public function patient_update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'national_id'   => 'required',
            'mobile_number' => 'required',
            'email'         => 'required|email',
            'photo'         => 'mimes:jpg,jpeg,png'
        ]);


        $patient = Patient::find($id);
        //image upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $slug = Str::slug($request->name);
            if (isset($file)) {
                $currentDate = Carbon::now()->toDateString();
                $filename    = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('uploads/patients')) {
                    mkdir('uploads/patients', 0777, true);
                }
                if ($patient->photo != NULL) {
                    unlink('uploads/patients/' . $patient->photo);
                }
                $file->move('uploads/patients', $filename);
            }
        } else {

            $filename = $patient->photo;
        }

        $patient->name          = $request->name;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->gender        = $request->gender;
        $patient->national_id   = $request->national_id;
        $patient->mobile_number = $request->mobile_number;
        $patient->email         = $request->email;
        $patient->photo         = $filename;
        $patient->save();
        Session::flash('status', 'Success');
        Session::flash('message', 'Patient Information Updated Successfully');
        return redirect()->route('patient.list');
    }

    /**
     * 
     * Remove the specific patient from datababase
     *
     * @param int patient $id
     * 
     * @return \Illuminate\Http\Response
     *
     */

    public function patient_delete($id)
    {

        $patient = Patient::find($id);
        Dependent::where('national_id', $patient->national_id)->delete();
        if ($patient->photo != NULL) {
            unlink('uploads/patients/' . $patient->photo);
        }
        $patient->delete();
        Session::flash('status', 'Success');
        Session::flash('message', 'Patient Deleted Successfully');
        return redirect()->route('patient.list');
    }
}//end class
