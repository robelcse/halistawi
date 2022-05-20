<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testdevice;

class TestdeviceController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([

            'device_name' => 'required',
            'device_model' => 'required',
            'unique_no' => 'required|unique:testdevices',
            'serial_no' => 'required',
            'brand' => 'required',
            'ppb_agent_id' => 'required',
            'device_owner' => 'required',
            'type' => 'required',
            'cost_share_agreement' => 'required',
            'contact_name' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'teststation_id' => 'required'

        ]);

        $testdevice = new Testdevice();
        $testdevice->name = $request->device_name;
        $testdevice->model = $request->device_model;
        $testdevice->unique_no = $request->unique_no;
        $testdevice->serial_no = $request->serial_no;
        $testdevice->brand = $request->brand;
        $testdevice->ppb_agent_id = $request->ppb_agent_id;
        $testdevice->device_owner = $request->device_owner;
        $testdevice->type = $request->type;
        $testdevice->cost_share_agreement = $request->cost_share_agreement;
        $testdevice->emergency_d_c_name = $request->contact_name;
        $testdevice->emergency_d_c_email = $request->contact_email;
        $testdevice->emergency_d_c_phone = $request->contact_phone;
        $testdevice->teststation_id = $request->teststation_id;
        $testdevice->save();

        if (!is_null($testdevice)) {
            return response()->json([

                'status' =>    'success',
                'status_code' =>   200,
                'data' => $testdevice
            ]);
        } else {

            return response()->json([

                'status' =>    'fail',
                'status_code' =>   400,
                'date' => []
            ]);
        }
    }

    public function getAlldevicesWithTeststation()
    {

        $testdevices = Testdevice::with('teststation')->orderBy('testdevice_id', 'DESC')->get();
        if (count($testdevices) != 0) {

            return response()->json([

                'status' =>    'success',
                'status_code' =>  200,
                'date'      =>  $testdevices
            ]);
        } else {

            return response()->json([

                'status' =>    'fail',
                'status_code' =>  400,
                'date'      =>  []
            ]);
        }
    }

    public function getSingledeviceWithTeststation($testdevice_id)
    {

          $testdevice = Testdevice::with('teststation')->where('testdevice_id', $testdevice_id)->first();
          if(!is_null($testdevice))
          {
      
            return response()->json([

                'status' =>    'success',
                'status_code' =>  200,
                'date'      =>  $testdevice
            ]);
              
          }else{

            return response()->json([

                'status' =>    'fail',
                'status_code' =>  400,
                'date'      =>  []
            ]);
          }
    }









}
