<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;

class IndividualController extends Controller
{

    /**
     * 
     * index method
     * 
     * @return view page with list of individual information
     * 
     */

    public function index(Request $request)
    {
        $individuals = Individual::orderBy('individual_id','desc');
        $keyword = $request->q;
        if (!empty($keyword)) {
            $individuals->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('p_o_box', 'LIKE', '%' . $keyword . '%')
                ->orWhere('phone', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                ->orWhere('pin', 'LIKE', '%' . $keyword . '%')
                ->orWhere('national_id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('city', 'LIKE', '%' . $keyword . '%')
                ->orWhere('country', 'LIKE', '%' . $keyword . '%')
                ->orWhere('sub_country', 'LIKE', '%' . $keyword . '%');
        }

        $individuals = $individuals->paginate(12)->withQueryString();
        return view('admin.individual.index', ['title' => 'View Individual', 'individuals' => $individuals]);
    }

    public function create()
    {
        return view('admin.individual.create', ['title' => 'Creaet Individual']);
    }


    /**
     * 
     * edit method
     * 
     * @param $id
     * 
     * @return view page with the single individual information
     * 
     */

    public function edit($id)
    {

        $individual = Individual::find($id);
        return view('admin.individual.edit', ['title' => 'Update individual info', 'individual' => $individual]);
    }

    /**
     * 
     * store method
     * 
     * @param $request
     * 
     * @return redirect to individual informatin list page
     * 
     */

    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required|in:male,female',
            'national_id' => 'required',
            'pin' => 'required',
            'national_id' => 'required',
            'p_o_box' => 'required',
            'city' => 'required',
            'country' => 'required',
            'sub_country' => 'required',
            'gps_pin' => 'required',
            'phone' => 'required',
            'email' => 'required'

        ]);

        //  return $request->all();


        //file upload for national id
        $nid_file = $request->file('national_id_attachment');
        $slug = Str::slug($request->name);

        if (isset($nid_file))
        {
            $currentDate = Carbon::now()->toDateString();
            $nid_filename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $nid_file->getClientOriginalExtension();
            if (!file_exists('uploads/individual/nid'))
            {
                mkdir('uploads/individual/nid',0777,true);
            }
            $nid_file->move('uploads/individual/nid',$nid_filename);
        }else{
            $nid_filename = NULL;
        }


        //file upload for pin attachement

        $pin_file = $request->file('pin_attachment');
        if (isset($pin_file))
        {
            $currentDate = Carbon::now()->toDateString();
            $pin_filename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $pin_file->getClientOriginalExtension();
            if (!file_exists('uploads/individual/pin'))
            {
                mkdir('uploads/individual/pin',0777,true);
            }
            $pin_file->move('uploads/individual/pin',$pin_filename);
        }else{
            $pin_filename = NULL;
        }

        $individual = new Individual();
        $individual->device_id = uniqid();
        $individual->name = $request->name;
        $individual->date_of_birth = $request->date_of_birth;
        $individual->gender = $request->gender;
        $individual->national_id = $request->national_id;
        $individual->national_id_attachment = $nid_filename;


        $individual->pin = $request->pin;
        $individual->pin_attachment = $pin_filename;

        //contact 
        $individual->phone = $request->phone;
        $individual->email = $request->email;

        //address
        $individual->p_o_box = $request->p_o_box;
        $individual->city = $request->city;
        $individual->country = $request->country;
        $individual->sub_country = $request->sub_country;
        $individual->gps_pin = $request->gps_pin;
        $individual->save();
        Session::flash('status', 'Success');
        Session::flash('message', 'Individual Information Created Successfully');
        return redirect()->route('individual.index');
    }

    /**
     * 
     * update method
     * 
     * @param Request,$id
     * 
     * return redirect individual list page
     * 
     */



    public function update(Request $request, $id)
    {



        $request->validate([

            'name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required|in:male,female',
            'national_id' => 'required',
            'pin' => 'required',
            'national_id' => 'required',
            'p_o_box' => 'required',
            'city' => 'required',
            'country' => 'required',
            'sub_country' => 'required',
            'gps_pin' => 'required',
            'phone' => 'required',
            'email' => 'required'

        ]);

        $individual = Individual::find($id);
        $individual->name = $request->name;
        $individual->date_of_birth = $request->date_of_birth;
        $individual->gender = $request->gender;
        $individual->national_id = $request->national_id;
        $individual->national_id_attachment = $request->national_id_attachment;


        $individual->pin = $request->pin;
        $individual->pin_attachment = $request->pin_attachment;

        //contact 
        $individual->phone = $request->phone;
        $individual->email = $request->email;

        //address
        $individual->p_o_box = $request->p_o_box;
        $individual->city = $request->city;
        $individual->country = $request->country;
        $individual->sub_country = $request->sub_country;
        $individual->gps_pin = $request->gps_pin;
        $individual->save();


        Session::flash('status', 'Success');
        Session::flash('message', 'Individual Information Updated Successfully');
        return redirect()->route('individual.index');
    }


    /**
     * 
     * show method
     * 
     * @param $id
     * 
     * @return json data with the information of $individual information
     * 
     */

    public function show($id)
    {


        $individual = Individual::find($id);
        if (!is_null($individual)) {
            return response()->json([

                'status' =>    'success',
                'status_code' =>   200,
                'data' => $individual
            ]);
        } else {

            return response()->json([

                'status' =>    'fail',
                'status_code' =>   400,
                'date' => []
            ]);
        }
    }

    /**
     * 
     * destroy method
     * 
     * @param $id
     * 
     * @return redirect individual list page  
     * 
     */


    public function destroy($id)
    {

        $individual = Individual::find($id);
        $individual->delete();
        Session::flash('status', 'Success');
        Session::flash('message', 'Individual Information Deleted Successfully');
        return redirect()->back();
    }
}
