<?php

namespace App\Http\Controllers\Aide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dependent;
use App\Models\Checkin;
use Carbon\Carbon;
use App\Models\Patient;

class AideController extends Controller
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
     * create dependent arr and insert into the patient table 
     * 
     * @param Object of Dependent Model
     * 
     * @return Boolean
     * 
     */
    protected function createArrOfDependent($dependent)
    {

        $patient_arr = array();
        $patient_arr['dependent_id'] = $dependent->dependent_id;
        $patient_arr['name'] = $dependent->name;
        $patient_arr['date_of_birth'] = $dependent->date_of_birth;
        $patient_arr['gender'] = $dependent->gender;
        $patient_arr['mobile_number'] = $dependent->mobile_number;
        $patient_arr['email'] = $dependent->email;
        $patient_arr['photo'] = $dependent->photo;
        $patient = Patient::create($patient_arr);
    }

    /**
     * 
     * get all dependent of patient or if no any dependent then checkin 
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $national_id, $dependent_id
     * 
     * @return josn Object / Boolean
     * 
     * 
     */

    protected function getDependentOrCheckin($request, $national_id = NULL, $dependent_id = NULL)
    {
        //get all dependent by national_id from dependent table
        $all_dependents = Dependent::where('national_id', $national_id)->get();
        // if dependents exist then it will return all dependents else it will checkin by national_id
        if (count($all_dependents) != 0) {
            return $this->jsonSuccess($all_dependents);
        } else {
            $existing_checkin = Checkin::orderBy('checkin_id', 'DESC')->where('national_id', $national_id)->orWhere('dependent_id', $dependent_id)->first();
            $current_date = Carbon::now()->format('d-m-Y');
            // it will eheck patient checkin exist today or not,if not exit then it will checkin today
            if ($existing_checkin != NULL && $current_date == $existing_checkin->created_at->format('d-m-Y')) {
                return $this->jsonError();
            } else {

                $checkin = $this->checkinByNationalId($request, $national_id);
                return $this->jsonSuccess($checkin);
            }
        }
    }


    /**
     * 
     * get all dependents of patient
     *
     * @param \Illuminate\Http\Request $request
     * @param int $national_id
     *
     * @return Boolean
     */

    public function getAllDependent(Request $request, $national_id)
    {

        $check_user_by_nid = User::where('national_id', $national_id)->first();
        if (!is_null($check_user_by_nid)) {
            return $this->getDependentOrCheckin($request, $national_id);
        } else {
            return $this->jsonError();
        }
    }

    /**
     * 
     * checkin patient by $dependent_id 
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $dependent_id
     * 
     * @return Object
     * 
     */

    protected function checkinByDependentId($request, $dependent_id)
    {
        $checkin = new Checkin();
        $checkin->dependent_id = $dependent_id;
        $checkin->doctor_id = $request->doctor_id;
        $checkin->checked_in_time = Carbon::now()->format('d-m-Y');
        $checkin->save();
        return $checkin;
    }

    /**
     * 
     * checkin patient by $national_id
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $national_id 
     * 
     * @return Object
     * 
     */

    protected function checkinByNationalId($request, $national_id)
    {
        $checkin = new Checkin();
        $checkin->national_id = $national_id;
        $checkin->doctor_id = $request->doctor_id;
        $checkin->checked_in_time = Carbon::now()->format('d-m-Y');
        $checkin->save();
        return $checkin;
    }

    /**
     * 
     * check existing checkin today if no exist then checkin
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $dependent_id
     * 
     * @return Json Object
     * 
     * 
     */

    protected function checkExistingCheckin($request, $dependent_id)
    {
        $existing_checkin = Checkin::orderBy('checkin_id', 'DESC')->where('dependent_id', $dependent_id)->first();
        if ($existing_checkin != NULL) {
            $current_date = Carbon::now()->format('d-m-Y');
            $existing_date = $existing_checkin->created_at->format('d-m-Y');
            if ($current_date == $existing_date) {
                return $this->jsonError();
            } else {
                $checkin = $this->checkinByDependentId($request, $dependent_id);
                return $this->jsonSuccess($checkin);
            }
        } else {
            $checkin = $this->checkinByDependentId($request, $dependent_id);
            return $this->jsonSuccess($checkin);
        }
    }

    /**
     * 
     * patient will be created from dependent, if no exist in patient
     * if no exist checkin today he/she will be checkin today
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $national_id
     * @param $dependent_id
     * 
     * @return Boolean
     * 
     * 
     */

    public function checkinDependent(Request $request, $national_id, $dependent_id)
    {
        $dependent = Dependent::where('dependent_id', $dependent_id)->first();
        if (!is_null($dependent)) {
            $patient_exist = Patient::where('dependent_id', $dependent_id)->first();
            //if patient not exit in patient table then insert 
            //else just check if today checkin exist or not, if not exit then checkin
            if (is_null($patient_exist)) {
                //insert data into the patient table
                $this->createArrOfDependent($dependent);
                //check existing checkin today or not, if not exist today then checkin
                return $this->checkExistingCheckin($request, $dependent_id);
            } else {
                return $this->checkExistingCheckin($request, $dependent_id);
            }
        } else {
            return $this->jsonError();
        }
    }
}
