<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Device;
use App\Models\Company;
use App\Models\Ppbagent;
use App\Models\Individual;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Deviceoperation;
use Illuminate\Validation\Rules\Unique;

use App\Models\EmergencyContact;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $devices = Device::orderBy('device_id', 'desc');
        $keyword = $request->q;
        if (!empty($keyword)) {
            $devices->where('brand', 'LIKE', '%' . $keyword . '%')
                ->orWhere('model', 'LIKE', '%' . $keyword . '%')
                ->orWhere('unique_device_id', 'LIKE', '%' . $keyword . '%');
        }

        $devices = $devices->paginate(12)->withQueryString();
        return view('admin.device.index', ['title' => 'All Devices', 'devices' => $devices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_county = DB::table('counties')->get();
        return view('admin.device.create', ['title' => 'Add Device', 'all_county' => $all_county]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            //device inofrmation validate
            'brand'        => 'required',
            'model'        => 'required',
            'series'       => 'required',
            'test_type'    => 'required',
            'device_pic'   => 'mimes:jpg,jpeg,png,webp',
            'device_owner' => 'required',
            'owner_type'   => "required_if:device_owner,==,others",

            //company information validate
            'company_name'           => "required_if:owner_type,==,company",
            'company_c_12'           => "required_if:owner_type,==,company",
            'company_pin'            => "required_if:owner_type,==,company",
            'company_pin_attachment' => 'mimes:jpg,jpeg,png,pdf,webp',
            'company_p_o_box'        => "required_if:owner_type,==,company",
            'company_city'           => "required_if:owner_type,==,company",
            'company_country'        => "required_if:owner_type,==,company",
            'company_sub_country'    => "required_if:owner_type,==,company",
            'company_gps_pin'        => "required_if:owner_type,==,company",
            'company_phone'          => "nullable|required_if:owner_type,==,company",
            'company_email'          => "nullable|email|required_if:owner_type,==,company",

            //individual information validate
            'individual_name'                   => "nullable|required_if:owner_type,==,individual",
            'individual_date_of_birth'          => "nullable|required_if:owner_type,==,individual",
            'individual_national_id'            => "nullable|required_if:owner_type,==,individual",
            'individual_pin'                    => "nullable|required_if:owner_type,==,individual",
            'gender'                            => "nullable|required_if:owner_type,==,individual",
            'individual_p_o_box'                => "nullable|required_if:owner_type,==,individual",
            'individual_city'                   => "nullable|required_if:owner_type,==,individual",
            'individual_country'                => "nullable|required_if:owner_type,==,individual",
            'individual_sub_country'            => "nullable|required_if:owner_type,==,individual",
            'individual_gps_pin'                => "nullable|required_if:owner_type,==,individual",
            'individual_phone'                  => "nullable|required_if:owner_type,==,individual",
            'individual_email'                  => "nullable|email|required_if:owner_type,==,individual",
            'individual_national_id_attachment' => 'mimes:jpg,jpeg,png,pdf,webp',
            'individual_pin_attachemnt'         => 'mimes:jpg,jpeg,png,pdf,webp',

            //ppbagent information validate
            'pbbagent_name' => 'required',
            'pbbagent_c_12' => 'mimes:jpg,jpeg,png,pdf,webp',
            'pbbagent_pin'  => 'required',
            'pin_attachment' => 'mimes:jpg,jpeg,png,pdf,webp',

            //emergency contact information validate
            'contact_name'    => 'required',
            'contact_phone'   => 'required',
            'contact_email'   => 'required|email',
            'contact_location' => 'required',
            // 'contact_address' => 'required',
        ]);

        // return $request->all();

        $auto_genarate_unique_id = uniqid();

        //store device daata 

        $device_file = $request->file('device_pic');
        $device_slug = Str::slug($request->model);

        if (isset($device_file)) {
            $currentDate     = Carbon::now()->toDateString();
            $device_filename = $device_slug . '-' . $currentDate . '-' . uniqid() . '.' . $device_file->getClientOriginalExtension();
            if (!file_exists('uploads/device')) {
                mkdir('uploads/device', 0777, true);
            }
            $device_file->move('uploads/device', $device_filename);
        } else {
            $device_filename = NULL;
        }

        $device                   = new Device();
        $device->brand            = $request->brand;
        $device->model            = $request->model;
        $device->series           = $request->series;
        $device->test_type        = implode(",", $request->test_type);
        $device->description      = trim($request->description);
        $device->device_pic       = $device_filename;
        $device->device_owner     = $request->device_owner;
        $device->owner_type       = $request->owner_type;
        $device->unique_device_id = $auto_genarate_unique_id;
        $device->save();

        $device_id = $device->device_id;
        if ($request->device_owner == 'others') {
            if ($request->owner_type == 'company') {
                $this->srote_company_info($request, $device_id);
            }
            if ($request->owner_type == 'individual') {
                $this->store_individual_info($request, $device_id);
            }
        }

        //store ppbagent data
        $this->store_ppbagent_info($request, $device_id);
        //store imergency contact
        $this->store_emergency_contact_info($request, $device_id);

        //store devide operation
        $this->store_device_operation($request, $device_id);

        Session::flash('status', 'Success');
        Session::flash('message', 'Device Information Added Successfully');
        return redirect()->route('device.index');
    }




    /**
     * 
     * srote_company_information
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $device_id
     * 
     * @return \Illuminate\Http\Response
     * 
     * @return Boolean
     * 
     */

    public function srote_company_info($request, $device_id)
    {

        if ($request->hasFile('company_pin_attachment')) {
            $company_pin_copy_file = $request->file('company_pin_attachment');
            $company_slug          = Str::slug($request->company_name);

            $currentDate                = Carbon::now()->toDateString();
            $company_pin_copy_file_name = $company_slug . '-' . $currentDate . '-' . uniqid() . '.' . $company_pin_copy_file->getClientOriginalExtension();
            if (!file_exists('uploads/company')) {
                mkdir('uploads/company', 0777, true);
            }
            $company_pin_copy_file->move('uploads/company', $company_pin_copy_file_name);
        } else {
            $company_pin_copy_file_name = NULL;
        }


        $company                 = new Company();
        $company->device_id      = $device_id;
        $company->name           = $request->company_name;
        $company->c_12           = $request->company_c_12;
        $company->pin            = $request->company_pin;
        $company->pin_attachment = $company_pin_copy_file_name;
        //contact
        $company->phone = $request->company_phone;
        $company->email = $request->company_email;
        //address
        $company->p_o_box     = $request->company_p_o_box;
        $company->city        = $request->company_city;
        $company->country     = $request->company_country;
        $company->sub_country = $request->company_sub_country;
        $company->location    = $request->company_gps_pin;
        $company->gps_pin     = $request->company_gps;
        $company->save();
    }


    /**
     * 
     * store individual information
     * 
     * @param \Illuminate\Htt\Request $request
     * @param int $device_id
     * 
     * @return Boolean
     * 
     */

    protected function store_individual_info($request, $device_id)
    {

        //national id attachment 
        if ($request->hasFile('individual_national_id_attachment')) {
            $individual_national_id_attachment = $request->file('individual_national_id_attachment');
            $individual_slug                   = Str::slug($request->individual_name);

            $currentDate                            = Carbon::now()->toDateString();
            $individual_national_id_attachment_name = $individual_slug . '-' . $currentDate . '-' . uniqid() . '.' . $individual_national_id_attachment->getClientOriginalExtension();
            if (!file_exists('uploads/individual')) {
                mkdir('uploads/individual', 0777, true);
            }
            $individual_national_id_attachment->move('uploads/individual', $individual_national_id_attachment_name);
        } else {
            $individual_national_id_attachment_name = NULL;
        }


        //individual pin attachement 
        if ($request->hasFile('individual_pin_attachemnt')) {
            $individual_pin_attachemnt = $request->file('individual_pin_attachemnt');
            $individual_slug           = Str::slug($request->individual_name);

            $currentDate                    = Carbon::now()->toDateString();
            $individual_pin_attachemnt_name = $individual_slug . '-' . $currentDate . '-' . uniqid() . '.' . $individual_pin_attachemnt->getClientOriginalExtension();
            if (!file_exists('uploads/individual')) {
                mkdir('uploads/individual', 0777, true);
            }
            $individual_pin_attachemnt->move('uploads/individual', $individual_pin_attachemnt_name);
        } else {
            $individual_pin_attachemnt_name = NULL;
        }

        $individual                         = new Individual();
        $individual->device_id              = $device_id;
        $individual->name                   = $request->individual_name;
        $individual->date_of_birth          = $request->individual_date_of_birth;
        $individual->gender                 = $request->gender;
        $individual->national_id            = $request->individual_national_id;
        $individual->national_id_attachment = $individual_national_id_attachment_name;


        $individual->pin            = $request->individual_pin;
        $individual->pin_attachment = $individual_pin_attachemnt_name;

        //contact 
        $individual->phone = $request->individual_phone;
        $individual->email = $request->individual_email;

        //address
        $individual->p_o_box     = $request->individual_p_o_box;
        $individual->city        = $request->individual_city;
        $individual->country     = $request->individual_country;
        $individual->sub_country = $request->individual_sub_country;
        $individual->location    = $request->individual_gps_pin;
        $individual->gps_pin     = $request->individual_gps;
        $individual->save();
    }

    /**
     * 
     * store ppbagent information
     *
     * @param \Illuminate\Http\Request $request
     * @param int $device_id
     *
     *
     * @return Boolean
     *
     */


    public function store_ppbagent_info($request, $device_id)
    {

        //ppba gentattachement 
        if ($request->hasFile('pin_attachment')) {
            $pin_attachment_file = $request->file('pin_attachment');
            $ppbagent_slug      = Str::slug($request->pbbagent_name);

            $currentDate             = Carbon::now()->toDateString();
            $pin_attachment_file_name = 'pin_attachment_'.$ppbagent_slug . '-' . $currentDate . '-' . uniqid() . '.' . $pin_attachment_file->getClientOriginalExtension();
            if (!file_exists('uploads/ppbagent')) {
                mkdir('uploads/ppbagent', 0777, true);
            }
            $pin_attachment_file->move('uploads/ppbagent', $pin_attachment_file_name);
        } else {
            $pin_attachment_file_name = NULL;
        }

        if ($request->hasFile('pbbagent_c_12')) {
            $pbbagent_c_12_file = $request->file('pbbagent_c_12');
            $ppbagent_slug      = Str::slug($request->pbbagent_name);

            $currentDate             = Carbon::now()->toDateString();
            $pbbagent_c_12_file_name = 'c_12_'.$ppbagent_slug . '-' . $currentDate . '-' . uniqid() . '.' . $pbbagent_c_12_file->getClientOriginalExtension();
            if (!file_exists('uploads/ppbagent')) {
                mkdir('uploads/ppbagent', 0777, true);
            }
            $pbbagent_c_12_file->move('uploads/ppbagent', $pbbagent_c_12_file_name);
        } else {
            $pbbagent_c_12_file_name = '';
        }


        $ppbagent                 = new Ppbagent();
        $ppbagent->name           = $request->pbbagent_name;
        $ppbagent->device_id      = $device_id;
        $ppbagent->pin            = $request->pbbagent_pin;
        $ppbagent->c_12           = $pbbagent_c_12_file_name;
        $ppbagent->description    = $request->pbbagent_description;
        $ppbagent->pin_attachment = $pin_attachment_file_name;
        $ppbagent->save();
    }



    /**
     * store emergency contact information
     *
     * @param \Illuminate\Http\Request $request
     * @param int $device_id
     *
     * @return Boolean
     *
     */

    protected function store_emergency_contact_info($request, $device_id)
    {

        $emergency_contact                    = new EmergencyContact();
        $emergency_contact->name              = $request->contact_name;
        $emergency_contact->device_id         = $device_id;
        $emergency_contact->phone             = $request->contact_phone;
        $emergency_contact->email             = $request->contact_email;
        $emergency_contact->gps_pin           = $request->contact_gps;
        $emergency_contact->address           = $request->contact_location;
        $emergency_contact->adres_description = $request->contact_adress_description;
        $emergency_contact->save();
    }



    /**
     * 
     * store device operation
     * 
     * @param \Illuminate\Http\Request $request, int $device_id
     * @param int $device_id
     * 
     * @return Boolean
     * 
     */

    public function store_device_operation($request, $device_id)
    {

        $deviceoperation               = new Deviceoperation();
        $deviceoperation->s_date_one   = $request->start_date_1;
        $deviceoperation->s_date_two   = $request->start_date_2;
        $deviceoperation->s_date_three = $request->start_date_3;
        $deviceoperation->e_date_one   = $request->end_date_1;
        $deviceoperation->e_date_two   = $request->end_date_2;
        $deviceoperation->e_date_three = $request->end_date_3;
        $deviceoperation->device_id    = $device_id;
        $deviceoperation->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device_show = Device::with(['Ppbagent', 'Company', 'Individual', 'Emergencycontact', 'deviceoperations'])->find($id);
        return view('admin.device.show', ['title' => 'Device Information', 'device' => $device_show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $device = Device::with(['Ppbagent', 'Company', 'Individual', 'Emergencycontact', 'deviceoperations'])->find($id);
        //return $device;
        // return var_dump($device->Company);
        // return $device->Individual;
        $all_county = DB::table('counties')->get();
        return view('admin.device.edit', ['title' => 'Edit Device Information', 'device' => $device, 'all_county' => $all_county]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        //validate data during updated
        $request->validate([

            //device inofrmation validate
            'brand'        => 'required',
            'model'        => 'required',
            'series'       => 'required',
            'test_type'    => 'required',
            'device_pic'   => 'mimes:jpg,jpeg,png,webp',
            'device_owner' => 'required',
            'owner_type'   => "required_if:device_owner,==,others",

            //company information validate
            'company_name'           => "required_if:owner_type,==,company",
            'company_c_12'           => "required_if:owner_type,==,company",
            'company_pin'            => "required_if:owner_type,==,company",
            'company_pin_attachment' => 'mimes:jpg,jpeg,png,pdf,webp',
            'company_p_o_box'        => "required_if:owner_type,==,company",
            'company_city'           => "required_if:owner_type,==,company",
            'company_country'        => "required_if:owner_type,==,company",
            'company_sub_country'    => "required_if:owner_type,==,company",
            'company_gps_pin'        => "required_if:owner_type,==,company",
            'company_phone'          => "nullable|required_if:owner_type,==,company",
            'company_email'          => "nullable|email|required_if:owner_type,==,company",

            //individual information validate
            'individual_name'                   => "nullable|required_if:owner_type,==,individual",
            'individual_date_of_birth'          => "nullable|required_if:owner_type,==,individual",
            'individual_national_id'            => "nullable|required_if:owner_type,==,individual",
            'individual_pin'                    => "nullable|required_if:owner_type,==,individual",
            'gender'                            => "nullable|required_if:owner_type,==,individual",
            'individual_p_o_box'                => "nullable|required_if:owner_type,==,individual",
            'individual_city'                   => "nullable|required_if:owner_type,==,individual",
            'individual_country'                => "nullable|required_if:owner_type,==,individual",
            'individual_sub_country'            => "nullable|required_if:owner_type,==,individual",
            'individual_gps_pin'                => "nullable|required_if:owner_type,==,individual",
            'individual_phone'                  => "nullable|required_if:owner_type,==,individual",
            'individual_email'                  => "nullable|email|required_if:owner_type,==,individual",
            'individual_national_id_attachment' => 'mimes:jpg,jpeg,png,pdf,webp',
            'individual_pin_attachemnt'         => 'mimes:jpg,jpeg,png,pdf,webp',

            //ppbagent information validate
            'pbbagent_name' => 'required',
            'pbbagent_pin'  => 'required',
            'pbbagent_c_12' => 'mimes:jpg,jpeg,png,pdf,webp',
            'pin_attachment' => 'mimes:jpg,jpeg,png,pdf,webp',

            //emergency contact information validate
            'contact_name'    => 'required',
            'contact_phone'   => 'required',
            'contact_email'   => 'required|email',
            'contact_location' => 'required',
            'contact_address' => 'required',
        ]);


        $device = Device::with(['Ppbagent', 'Company', 'Individual', 'Emergencycontact', 'deviceoperations'])->where('device_id', $id)->first();

        //update device image
        $device_file = $request->file('device_pic');
        $device_slug = Str::slug($request->model);

        if (isset($device_file)) {
            $currentDate     = Carbon::now()->toDateString();
            $device_filename = $device_slug . '-' . $currentDate . '-' . uniqid() . '.' . $device_file->getClientOriginalExtension();
            if (!file_exists('uploads/device')) {
                mkdir('uploads/device', 0777, true);
            }
            if ($device->device_pic != NULL) {
                unlink('uploads/device/' . $device->device_pic);
            }
            $device_file->move('uploads/device', $device_filename);
        } else {
            $device_filename = $device->device_pic;
        }

        //update device 
        $device->brand        = $request->brand;
        $device->model        = $request->model;
        $device->series       = $request->series;
        $device->test_type    = implode(",", $request->test_type);
        $device->description  = trim($request->description);
        $device->device_pic   = $device_filename;
        $device->device_owner = $request->device_owner;
        $device->owner_type   = $request->owner_type;
        $device->save();


        //conditionally update/create company/individual infromation
        if ($request->device_owner == 'others') {

            if ($request->owner_type == 'company') {
                if ($device->Company) {
                    $this->update_company($request, $id);
                } elseif ($device->Individual) {
                    $individual = Individual::where('device_id', $id)->first();
                    if ($individual->national_id_attachment != NULL) {

                        unlink('uploads/individual/' . $individual->national_id_attachment);
                    }
                    if ($individual->pin_attachment != NULL) {

                        unlink('uploads/individual/' . $individual->pin_attachment);
                    }
                    $individual->delete();
                    $this->srote_company_info($request, $id);
                } else {
                    $this->srote_company_info($request, $id);
                }
            }

            if ($request->owner_type == 'individual') {
                if ($device->Individual) {
                    $this->update_individual($request, $id);
                } elseif ($device->Company) {
                    $company = Company::where('device_id', $id)->first();
                    if ($company->pin_attachment != NULL) {
                        unlink('uploads/company/' . $company->pin_attachment);
                    }
                    $company->delete();
                    $this->store_individual_info($request, $id);
                } else {
                    $this->store_individual_info($request, $id);
                }
            }
        } else {
            if ($device->Company) {
                $company = Company::where('device_id', $id)->first();
                if ($company->pin_attachment != NULL) {
                    unlink('uploads/company/' . $company->pin_attachment);
                }
                $company->delete();
            }
            if ($device->Individual) {
                $individual = Individual::where('device_id', $id)->first();
                if ($individual->national_id_attachment != NULL) {
                    unlink('uploads/individual/' . $individual->national_id_attachment);
                }
                if ($individual->pin_attachment != NULL) {
                    unlink('uploads/individual/' . $individual->pin_attachment);
                }
                $individual->delete();
            }
        }

        //update ppbagent information
        $this->update_ppbagent($request, $id);

        //update emergency-contact information
        $this->update_emergentcy_contact($request, $id);

        //update emergency-contact information
        $this->update_device_operation($request, $id);

        Session::flash('status', 'Success');
        Session::flash('message', 'Device Information Updated Successfully');
        return redirect()->route('device.index');
    }


    /**
     * 
     * update company information
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $device_id
     * 
     * @return Boolean
     * 
     */

    public function update_company($request, $device_id)
    {


        $company = Company::where('device_id', $device_id)->first();

        if ($request->hasFile('company_pin_attachment')) {
            $company_pin_copy_file = $request->file('company_pin_attachment');
            $company_slug          = Str::slug($request->company_name);

            $currentDate                = Carbon::now()->toDateString();
            $company_pin_copy_file_name = $company_slug . '-' . $currentDate . '-' . uniqid() . '.' . $company_pin_copy_file->getClientOriginalExtension();
            if (!file_exists('uploads/company')) {
                mkdir('uploads/company', 0777, true);
            }

            if ($company->pin_attachment != NULL) {

                unlink('uploads/company/' . $company->pin_attachment);
            }
            $company_pin_copy_file->move('uploads/company', $company_pin_copy_file_name);
        } else {

            $company_pin_copy_file_name = $company->pin_attachment;
        }


        Company::where('device_id', $device_id)->update([

            'name' => $request->company_name,
            'c_12' => $request->company_c_12,

            'pin'            => $request->company_pin,
            'pin_attachment' => $company_pin_copy_file_name,

            'phone' => $request->company_phone,
            'email' => $request->company_email,

            'p_o_box'     => $request->company_p_o_box,
            'city'        => $request->company_city,
            'country'     => $request->company_country,
            'sub_country' => $request->company_sub_country,
            'location'     => $request->company_gps_pin,
            'gps_pin'     => $request->company_gps,
        ]);
    }


    /**
     * 
     * update individual informatin
     * 
     * @param \Illuminate\Http\Request $request
     * @param $device_id
     * 
     * @return Boolean
     *
     */

    public function update_individual($request, $device_id)
    {

        $individual = Individual::where('device_id', $device_id)->first();

        //national id attachment 
        if ($request->hasFile('individual_national_id_attachment')) {
            $individual_national_id_attachment = $request->file('individual_national_id_attachment');
            $individual_slug                   = Str::slug($request->individual_name);

            $currentDate                            = Carbon::now()->toDateString();
            $individual_national_id_attachment_name = $individual_slug . '-' . $currentDate . '-' . uniqid() . '.' . $individual_national_id_attachment->getClientOriginalExtension();
            if (!file_exists('uploads/individual')) {
                mkdir('uploads/individual', 0777, true);
            }

            if ($individual->national_id_attachment != NULL) {

                unlink('uploads/individual/' . $individual->national_id_attachment);
            }

            $individual_national_id_attachment->move('uploads/individual', $individual_national_id_attachment_name);
        } else {
            $individual_national_id_attachment_name = $individual->national_id_attachment;
        }

        //individual pin attachement 
        if ($request->hasFile('individual_pin_attachemnt')) {
            $individual_pin_attachemnt = $request->file('individual_pin_attachemnt');
            $individual_slug           = Str::slug($request->individual_name);

            $currentDate                    = Carbon::now()->toDateString();
            $individual_pin_attachemnt_name = $individual_slug . '-' . $currentDate . '-' . uniqid() . '.' . $individual_pin_attachemnt->getClientOriginalExtension();
            if (!file_exists('uploads/individual')) {
                mkdir('uploads/individual', 0777, true);
            }

            if ($individual->pin_attachment != NULL) {

                unlink('uploads/individual/' . $individual->pin_attachment);
            }
            $individual_pin_attachemnt->move('uploads/individual', $individual_pin_attachemnt_name);
        } else {
            $individual_pin_attachemnt_name = $individual->pin_attachment;
        }

        Individual::where('device_id', $device_id)->update([

            'name'                   => $request->individual_name,
            'date_of_birth'          => $request->individual_date_of_birth,
            'gender'                 => $request->gender,
            'national_id'            => $request->individual_national_id,
            'national_id_attachment' => $individual_national_id_attachment_name,

            'pin'            => $request->individual_pin,
            'pin_attachment' => $individual_pin_attachemnt_name,

            'phone' => $request->individual_phone,
            'email' => $request->individual_email,

            'p_o_box'     => $request->individual_p_o_box,
            'city'        => $request->individual_city,
            'country'     => $request->individual_country,
            'sub_country' => $request->individual_sub_country,
            'location'     => $request->individual_gps_pin,
            'gps_pin'     => $request->individual_gps,
        ]);
    }


    /**
     * 
     * update ppbagent information
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $device_id
     * 
     * @return Boolean
     * 
     */


    public function update_ppbagent($request, $device_id)
    {
        $ppbagent = Ppbagent::where('device_id', $device_id)->first();
        //ppba gentattachement 
        if ($request->hasFile('pin_attachment')) {
            $pin_attachment_file = $request->file('pin_attachment');
            $ppbagent_slug      = Str::slug($request->pbbagent_name);
            $currentDate             = Carbon::now()->toDateString();
            $pin_attachment_file_name = 'pin_attachment_'.$ppbagent_slug . '-' . $currentDate . '-' . uniqid() . '.' . $pin_attachment_file->getClientOriginalExtension();
            if (!file_exists('uploads/ppbagent')) {
                mkdir('uploads/ppbagent', 0777, true);
            }

            if ($ppbagent->pin_attachment != NULL) {
                unlink('uploads/ppbagent/' . $ppbagent->pin_attachment);
            }

            $pin_attachment_file->move('uploads/ppbagent', $pin_attachment_file_name);
        } else {
            $pin_attachment_file_name = $ppbagent->pin_attachment;
        }


         //ppba gentattachement 
         if ($request->hasFile('c_12')) {
            $c_12_file = $request->file('c_12');
            $ppbagent_slug      = Str::slug($request->pbbagent_name);

            $currentDate             = Carbon::now()->toDateString();
            $c_12_file_name = 'c_12_'.$ppbagent_slug . '-' . $currentDate . '-' . uniqid() . '.' . $c_12_file->getClientOriginalExtension();
            if (!file_exists('uploads/ppbagent')) {
                mkdir('uploads/ppbagent', 0777, true);
            }

            if ($ppbagent->c_12 != NULL) {
                unlink('uploads/ppbagent/' . $ppbagent->c_12);
            }

            $c_12_file->move('uploads/ppbagent', $c_12_file_name);
        } else {
            $c_12_file_name = $ppbagent->c_12;
        }
       
        Ppbagent::where('device_id', $device_id)->update([

            'name'        => $request->pbbagent_name,
            'pin'         => $request->pbbagent_pin,
            'c_12'        => $c_12_file_name,
            'description' => $request->pbbagent_description,
            'pin_attachment'        => $pin_attachment_file_name
        ]);
    }


    /**
     * 
     * update emergency contact information
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $device_id
     * 
     * @return Boolean
     * 
     */

    public function update_emergentcy_contact($request, $device_id)
    {

        EmergencyContact::where('device_id', $device_id)->update([

            'name'              => $request->contact_name,
            'phone'             => $request->contact_phone,
            'email'             => $request->contact_email,
            'gps_pin'           => $request->contact_gps,
            'address'           => $request->contact_location,
            'adres_description' => $request->contact_adress_description,
        ]);
    }

    /**
     * 
     * update device operation
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $device_id
     * 
     * @return Boolean
     * 
     */

    public function update_device_operation($request, $device_id)
    {

        Deviceoperation::where('device_id', $device_id)
            ->update([
                's_date_one'   => $request->s_date_one,
                's_date_two'   => $request->s_date_two,
                's_date_three' => $request->s_date_three,
                'e_date_one'   => $request->e_date_one,
                'e_date_two'   => $request->e_date_two,
                'e_date_three' => $request->e_date_three,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);

        $device->delete();
        Session::flash('status', 'Success');
        Session::flash('message', 'Device Information Deleted Successfully');
        return redirect()->back();
    }
}
