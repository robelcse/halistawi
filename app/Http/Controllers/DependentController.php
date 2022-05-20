<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Checkin;
use App\Models\Dependent;
use Carbon\Carbon;

class DependentController extends Controller
{

    /**
     * 
     * get list of patients with his/her dependents
     * 
     * @return list of patients with all dependents 
     * 
     */

    public function listOfPatientWithDependents()
    {
        //$patients = Patient::with('dependents')->get();
        $patients = Patient::orderBy('patient_id', 'DESC')->get();
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'date' => $patients
        ]);
    }

    /**
     * 
     * get single patient with his/her all dependents
     * 
     * @return single patient with his/her all dependents
     * 
     */

    public function singlePatientWithDependents($national_id)
    {
        $patient = User::where('national_id', $national_id)->first();
        if (!is_null($patient)) {
            $patients = Dependent::where('national_id', $national_id)->get();
            return response()->json([
                'status' => 'success',
                'status_code' => 200,
                'data' => [
                    'patient'=>$patient,
                    'dependents'=>$patients
                ]
            ]);
        } else {
            return response()->json([
                'status' => 'fail',
                'status_code' => 400,
                'data' => []
            ]);
        }
    }

    /**
     * 
     * add_dependent_by_aide
     * 
     * 
     * @param $reques, $national_id
     * 
     * @return boolen json data
     * 
     */

     public function add_dependent_by_aide(Request $request, $national_id)
     {

 
        $user = User::where('national_id', $national_id)->first();
        if(!is_null($user))
        {
            $request->validate([
                'name' => 'required|string',
                'date_of_birth' => 'required',
                'relation' => 'required'
            ]);
    
            $dependent_existing_check = Dependent::where([
    
                'name' => $request->name,
                'date_of_birth' => $request->date_of_birth,
                'relation' => $request->relation,
                'national_id'=> $national_id
            ])->first();
    
    
            if (is_null($dependent_existing_check)) {
    
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


                    $patient = new Patient();
                    $patient->name = $request->name;
                    $patient->date_of_birth = $request->date_of_birth;
                    $patient->save();

                    $checkin = new Checkin();
                    $checkin->dependent_id = $dependent->dependent_id;
                    $checkin->doctor_id = $request->doctor_id;
                    $checkin->checked_in_time = Carbon::now()->format('d-m-Y');
                    $checkin->save();

    
                    if (!is_null($dependent)) {
                        return response()->json([
    
                            'status' => 'success',
                            'status_code' => 200,
                            'data' => $dependent
                        ]);
                    } else {
    
                        return response()->json([
    
                            'status' => 'fail',
                            'status_code' => 400,
                            'data' => []
                        ]);
                    }
               
            } else {
    
                return response()->json([
                    'status' => 'fail',
                    'status_code' => 400,
                    'message' => 'dependent already exist!'
                ]);
            }
             
        }else{

            return response()->json([
                'status' => 'fail',
                'status_code' => 400,
                'date' => []
            ]);
        }
     }
}
