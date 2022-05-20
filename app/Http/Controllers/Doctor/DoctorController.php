<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;
use App\Models\Refer;
use App\Models\Patient;
use App\Models\User;
use PhpParser\Comment\Doc;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Dependent;
use App\Models\Checkin;

class DoctorController extends Controller
{

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



    /**
     * 
     * get lists of patients
     * 
     * @return array of Object
     * 
     */

    public function getAllPatients()
    {
        $patients = Patient::orderBy('patient_id', 'desc')->get();
        if (!is_null($patients)) {
            return $this->jsonSuccess($patients);
        } else {
            return $this->jsonError();
        }
    }


    /**
     * 
     * get all pending patient with(patient info/dependent info) who have checkin
     * 
     * @return array of Object
     * 
     */

    public function pendingPatients()
    {
        $pendingPatients = Checkin::all();
        if (count($pendingPatients) != 0) {

            $patients = array();
            foreach ($pendingPatients as $patient) {

                if ($patient->national_id != NULL) {
                    $patient_by_nid   = Patient::where('national_id', $patient->national_id)->first();
                    $patient->profile = $patient_by_nid;
                } else {
                    $patient_by_dependent_id = Dependent::where('dependent_id', $patient->dependent_id)->first();
                    $patient->profile        = $patient_by_dependent_id;
                }

                $patients[] = $patient;
            }
            return $this->jsonSuccess($patients);
        } else {

            return $this->jsonError();
        }
    }

    /**
     * get a single patient who have checkin 
     *
     * @param integer $patient_id 
     * 
     * @return Object  
     */

    public function checkedinPatient($national_id)
    {

        $patient = Patient::where('national_id', $national_id)->first();
        if (!is_null($patient)) {
            $checkinPatient = Checkin::where('national_id', $national_id)->with(['patient:patient_id,name,date_of_birth,gender,national_id,mobile_number,email,photo'])->first();
            if (!is_null($checkinPatient)) {
                return $this->jsonSuccess($checkinPatient);
            } else {
                return $this->jsonError();
            }
        } else {
            return $this->jsonError();
        }
    }

    /**
     * 
     * get records of single patient
     * 
     * @param int $patient_id
     * 
     * @return array ob Object
     * 
     * 
     */

    public function recordsOfPatient($patient_id)
    {
        $patient = Patient::where('patient_id', $patient_id)->first();
        if (!is_null($patient)) {

            $records_of_patient = Record::select('record_id', 'medicine', 'notes')->where('patient_id', $patient_id)->get();
            if (count($records_of_patient) != 0) {

                return response()->json([
                    'status'      => 'success',
                    'status_code' => 400,
                    'id'          => $patient->patient_id,
                    'full_name'   => $patient->full_name,
                    'photo'       => $patient->photo,
                    'records'     => $records_of_patient
                ]);
            } else {
                return $this->jsonError();
            }
        } else {
            return $this->jsonError();
        }
    }


    /**
     * 
     * single record of patient
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $patient_id
     * 
     * @return Object
     * 
     */

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
                return $this->jsonError();
            }
        } else {
            return $this->jsonError();
        }
    }


    /**
     * 
     * make array of record
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Object of record
     * 
     */

    protected function makeArrOfRecord($request, $patient_id)
    {
              $data         = array();
        $data['patient_id'] = $patient_id;
        $data['doctor_id']  = $request->doctor_id;
        $data['medicine']   = json_encode($request->medicine);
        $data['notes']      = 'this is the note of doctor';
        return $data;
    }

    /**
     * 
     * prescribe medicine for patient
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $patient_id
     * 
     * 
     */

    public function prescribe(Request $request, $patient_id)
    {
        $request->validate([
            'doctor_id' => 'required',
            'medicine'  => 'required',
            'notes'     => 'required'
        ]);
        $patient = Patient::where('patient_id', $patient_id)->first();
        if (!is_null($patient)) {
            $data   = $this->makeArrOfRecord($request, $patient_id);
            $record = Record::create($data);
            if (!is_null($record)) {
                return response()->json([
                    'status'      => 'success',
                    'status_code' => '200',
                    'patient_id'  => $patient_id,
                    'medecine'    => $record->medicine,
                    'notes'       => $record->notes
                ]);
            } else {
                return $this->jsonError();
            }
        } else {
            return $this->jsonError();
        }
    }




    public function refer(Request $request, $patient_id)
    {
        $request->validate([
            'refer_type' => 'required',
            'name'       => 'required'
        ]);
        $patient = Patient::where('patient_id', $patient_id)->first();
        if (!is_null($patient)) {
            $refer             = new Refer();
            $refer->patient_id = $patient_id;
            $refer->refer_type = $request->refer_type;
            $refer->name       = $request->name;
            $refer->save();
            if (!is_null($refer)) {
                return $this->jsonSuccess($refer);
            } else {
                return $this->jsonError();
            }
        } else {
            return $this->jsonError();
        }
    }

    /**
     * 
     * Display list of doctor
     * 
     * @return array[] of doctor
     * 
     */

    public function doctor_list(Request $request)
    {
        $users = User::orderBy('id', 'desc')->where('role', 'doctor');
        $keyword = $request->q;
        if (!empty($keyword)) {
            $users->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('gender', 'LIKE', '%' . $keyword . '%')
                ->orWhere('mobile_number', 'LIKE', '%' . $keyword . '%')
                ->orWhere('national_id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                ->orWhere('role', 'LIKE', '%' . $keyword . '%');
        }

        $doctors = $users->paginate(12)->withQueryString();
        return view('admin.doctors.index', ['title' => 'Doctor List', 'doctors' => $doctors]);
    }


    /**
     * 
     * show the form for edit specefic docot
     *
     * @param int doctor $id
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function doctor_edit($id)
    {
        $doctor = User::find($id);
        return view('admin.doctors.edit', ['title' => 'Update Doctor', 'doctor' => $doctor]);
    }

    /**
     * 
     * update a specific docor information
     * 
     * @param \Illuminate\Http\Request
     * 
     * @param int patient $id
     * 
     * @return \Illuminate\Http\Response
     * 
     */

    public function doctor_update(Request $request, $id)
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



        $doctor = User::find($id);
        //image upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $slug = Str::slug($request->name);
            if (isset($file)) {
                $currentDate = Carbon::now()->toDateString();
                $filename    = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('uploads/patients')) {
                    mkdir('uploads/doctors', 0777, true);
                }
                if ($doctor->photo != NULL) {
                    unlink('uploads/doctors/' . $doctor->photo);
                }
                $file->move('uploads/doctors', $filename);
            }
        } else {

            $filename = $doctor->photo;
        }

        $doctor->name          = $request->name;
        $doctor->date_of_birth = $request->date_of_birth;
        $doctor->gender        = $request->gender;
        $doctor->national_id   = $request->national_id;
        $doctor->mobile_number = $request->mobile_number;
        $doctor->email         = $request->email;
        $doctor->photo         = $filename;
        
        if($request->role){
            $doctor->email  = $request->email;
        }
        $doctor->save();
        Session:: flash('status', 'Success');
        Session:: flash('message', 'Doctor Information Updated Successfully');
        return redirect()->route('doctor.list');
    }

    /**
     * 
     * remove a apecific doctor from database
     *
     * @param int doctor $id
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function doctor_delete($id)
    {

        $doctor = User::find($id);
        if ($doctor->photo != NULL) {
            unlink('uploads/doctors/' . $doctor->photo);
        }
        $doctor->delete();
        Session:: flash('status', 'Success');
        Session:: flash('message', 'Dcotor Deleted Successfully');
        return redirect()->route('doctor.list');
    }
}// 
