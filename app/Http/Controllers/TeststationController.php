<?php

namespace App\Http\Controllers;

use App\Models\Testdevice;
use App\Models\Teststation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TeststationController extends Controller
{
 
    public function store(Request $request)
    {

        $request->validate([

              'name'=>'required|string',
              'type'=>'required|string',
              'category'=>'required|string',
              'location'=>'required|string'
              
        ]);

        $currentDate = Carbon::now()->toDateString();
        $unique_id = $currentDate.'-'. uniqid();

        $teststation =  new Teststation();
        $teststation->name = $request->name;
        $teststation->unique_id = $unique_id;
        $teststation->type = $request->type;
        $teststation->category = $request->category;
        $teststation->location = $request->location;
        $teststation->save();
        
        if(!is_null($teststation))
        {
            return response()->json([

                'status'=>    'success',
                'status_code'=>   200,
                'data'=>$teststation
            ]);
        }else{

            return response()->json([

                'status'=>    'fail',
                'status_code'=>   400,
                'date'=>[]
            ]);
        }

    }

    public function listOfStationWithDevices()
    {

        $teststation = Teststation::with('testdevices')->get();
        if(!is_null($teststation))
        {
            return response()->json([

                'status'=>    'success',
                'status_code'=>   200,
                'data'=>$teststation
            ]);
        }else{

            return response()->json([

                'status'=>    'fail',
                'status_code'=>   400,
                'date'=>[]
            ]);
        }
    }

    public function singleStationWithDevices($teststation_id)
    {

         $teststation = Teststation::where('teststation_id', $teststation_id)->first();
         if(!is_null($teststation))
         {

            $teststation = Teststation::with('testdevices')->where('teststation_id', $teststation_id)->get();
            if(count($teststation) != 0){

                return response()->json([

                     'status'=>'success',
                     'status_code'=>200,
                     'data'=>$teststation
                ]);

            }else{

                return response()->json([
                    'status'=>'fail',
                    'status_code'=>400,
                    'data'=>[]
               ]);

            }

         }else{

            return response()->json([
                 'status'=>'fail',
                 'statud_code'=>400,
                 'data'=>[]
            ]);
         }
    }
}
