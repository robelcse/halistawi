<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CompanyController extends Controller
{

    /**
     * 
     * get list of company
     * 
     * 
     * @return array[]
     * 
     */

    public function index(Request $request)
    {
        $companies = Company::orderBy('company_id','desc');
        $keyword = $request->q;
        if (!empty($keyword)) {
            $companies->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('c_12', 'LIKE', '%' . $keyword . '%')
                ->orWhere('pin', 'LIKE', '%' . $keyword . '%')
                ->orWhere('phone', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                ->orWhere('city', 'LIKE', '%' . $keyword . '%')
                ->orWhere('country', 'LIKE', '%' . $keyword . '%')
                ->orWhere('sub_country', 'LIKE', '%' . $keyword . '%');
        }

        $companies = $companies->paginate(12)->withQueryString();

        return view('admin.company.index', ['title' => 'View Company', 'companies' => $companies]);
    }

    /**
     * 
     * show view page to create company information
     * 
     * @return view page 
     * 
     */

    public function create()
    {
        return view('admin.company.create', ['title' => 'Creaet Company']);
    }

    /**
     * 
     * edit company information
     * 
     * @param company $id
     * 
     * @return object
     * 
     */

    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.company.edit', ['title' => 'Update Company', 'company' => $company]);
    }


    /**
     * 
     * store company
     * 
     * @param $request data
     * 
     * @return redirect to company list page with session message
     * 
     */

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'c_12' => 'required',
            'pin' => 'required',
            'pin_attachment'=>'max:2048|mimes:jpg,jpeg,png,pdf,bmp',
            'phone' => 'required',
            'email' => 'required',
            'p_o_box' => 'required',
            'city' => 'required',
            'country' => 'required',
            'sub_country' => 'required',
            'gps_pin' => 'required' 
        ]);


        $file = $request->file('pin_attachment');
        $slug = Str::slug($request->name);

        if (isset($file))
        {
            $currentDate = Carbon::now()->toDateString();
            $filename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $file->getClientOriginalExtension();
            if (!file_exists('uploads/company'))
            {
                mkdir('uploads/company',0777,true);
            }
            $file->move('uploads/company',$filename);
        }else{
            $filename = NULL;
        }

        $company = new Company();
        $company->device_id = uniqid();
        $company->name = $request->name;
        $company->c_12 = $request->c_12;
        $company->pin = $request->pin;
        $company->pin_attachment = $filename;
        //contact
        $company->phone = $request->phone;
        $company->email = $request->email;
        //address
        $company->p_o_box = $request->p_o_box;
        $company->city = $request->city;
        $company->country = $request->country;
        $company->sub_country = $request->sub_country;
        $company->gps_pin = $request->gps_pin; 
        $company->save();
        Session::flash('status', 'Success');
        Session::flash('message', 'Company Created Successfully');
        return redirect()->route('company.index');
   
    }


    /**
     * 
     * update company information
     * 
     * @param Request,$id
     * 
     * return redirect company list page
     * 
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'c_12' => 'required',
            'pin' => 'required',
            'pin_attachment'=>'max:2048|mimes:jpg,jpeg,png,pdf,bmp',
            'phone' => 'required',
            'email' => 'required',
            'p_o_box' => 'required',
            'city' => 'required',
            'country' => 'required',
            'sub_country' => 'required',
            'gps_pin' => 'required' 
        ]);



        $company = Company::find($id);
        $file = $request->file('pin_attachment');
        $slug = Str::slug($request->name);

        if (isset($file))
        {
            $currentDate = Carbon::now()->toDateString();
            $filename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $file->getClientOriginalExtension();
            if (!file_exists('uploads/company'))
            {
                mkdir('uploads/company',0777,true);
            }
            if($company->pin_attachment != NULL){

                unlink('uploads/company/'.$company->pin_attachment);

            }
            $file->move('uploads/company',$filename);
        }else{
            $filename = $company->pin_attachment;
        }


        $company->name = $request->name;
        $company->c_12 = $request->c_12;
        $company->pin = $request->pin;
        $company->pin_attachment = $filename;
        
        //contact
        $company->phone = $request->phone;
        $company->email = $request->email;

        //address
        $company->p_o_box = $request->p_o_box;
        $company->city = $request->city;
        $company->country = $request->country;
        $company->sub_country = $request->sub_country;
        $company->gps_pin = $request->gps_pin; 
        $company->save();
        Session::flash('status', 'Success');
        Session::flash('message', 'Company Information Updated Successfully');
        return redirect()->route('company.index');
    }


    /**
     * 
     * show company
     * 
     * @param compay $id
     * 
     * @return object
     * 
     */

    public function show($id)
    {
        $company = Company::find($id);
        if (!is_null($company)) {
            return response()->json([
                'status' =>    'success',
                'status_code' =>   200,
                'data' => $company
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
     * delete company information
     * 
     * @param $id
     * 
     * @return redirect company list page  
     * 
     */


    public function destroy($id)
    {
       $company = Company::find($id);

       if (file_exists('uploads/company/'.$company->pin_attachment))
        {
            unlink('uploads/company/'.$company->pin_attachment);
        }
        $company->delete();
        Session::flash('status', 'Success');
        Session::flash('message', 'Company Deleted Successfully');
        return redirect()->back();
    }
}
