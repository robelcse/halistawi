<?php

namespace App\Http\Controllers\Dependent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dependent;
use App\Models\Patient;
use App\Models\Checkin;
use Carbon\Carbon;

class DependentController extends Controller
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
     * create dependent into dependent tbale
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $national_id
     * 
     * @return Object of Dependent
     * 
     */

    protected function createDependent($request, $national_id)
    {
        $dependent = new Dependent();
        $dependent->name = $request->name;
        $dependent->date_of_birth = $request->date_of_birth;
        $dependent->gender = $request->gender;
        $dependent->national_id = $national_id;
        $dependent->mobile_number = $request->mobile_number;
        $dependent->email = $request->email;
        $dependent->photo = $request->photo;
        $dependent->relation = $request->relation;
        $dependent->save();
        return $dependent;
    }

    /**
     * 
     * create patient into patient table
     * 
     * @param \Illuminate\Http\Request $request
     * @param Object $dependent
     * 
     * @return Boolean
     * 
     * 
     */

    protected function createPatient($request, $dependent)
    {
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->dependent_id = $dependent->dependent_id;
        $patient->save();
    }

    /**
     * 
     * checkin dependent
     * 
     * @param \Illuminate\Http\Request $request
     * @param Object $dependent
     * 
     * @return Boolean
     *
     */

    protected function checkinDependent($request, $dependent)
    {
        $checkin = new Checkin();
        $checkin->dependent_id = $dependent->dependent_id;
        $checkin->doctor_id = $request->doctor_id;
        $checkin->checked_in_time = Carbon::now()->format('d-m-Y');
        $checkin->save();
    }


    /**
     * 
     * dependent existing check
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $national_id
     * 
     * @return Boolean
     * 
     */

    protected function dependentExistingCheck($request, $national_id)
    {
        $dependent_existing_check = Dependent::where([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'relation' => $request->relation,
            'national_id' => $national_id
        ])->first();

        return  $dependent_existing_check;
    }

    /**
     * 
     * add dependent by aide
     * 
     * @param \Illuminate\Http\Request $request
     * @param $national_id
     * 
     * @return Json Object
     * 
     */

    public function addDependentByAide(Request $request, $national_id)
    {
        $user = User::where('national_id', $national_id)->first();
        if (!is_null($user)) {
            $request->validate([
                'name' => 'required|string',
                'date_of_birth' => 'required',
                'relation' => 'required'
            ]);

            $dependent_existing_check =  $this->dependentExistingCheck($request, $national_id);
            if (is_null($dependent_existing_check)) {

                $dependent = $this->createDependent($request, $national_id);
                $this->createPatient($request, $dependent);
                $this->checkinDependent($request, $dependent);
                $json_output = "";
                $json_success = $this->jsonSuccess($dependent);
                $json_error   = $this->jsonError();
                $dependent != NULL ? $json_output = $json_success  : $json_output = $json_error;
                return $json_output;
            } else {
                return $this->jsonError();
            }
        } else {

            return $this->jsonError();
        }
    }




    
}
