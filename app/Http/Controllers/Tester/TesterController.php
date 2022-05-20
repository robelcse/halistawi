<?php

namespace App\Http\Controllers\Tester;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Patient;

class TesterController extends Controller
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
     * make test for patient
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $patient_id
     * 
     * @return Json Object
     * 
     */


    public function testInsert(Request $request, $patient_id)
    { 
        $request->validate([
            'test_name' => 'required|min:2'
        ]);
        $patient = Patient::where('patient_id', $patient_id)->first();
        if (!is_null($patient)) {
            $test             = new Test();
            $test->patient_id = $patient_id;
            $test->test_name  = $request->test_name;
            $test->save();

            if (!is_null($test)) {
                return $this->jsonSuccess($test);
            } else {
                return $this->jsonError();
            }
        } else {
            return $this->jsonError();
        }
    }
}//
