<?php

namespace App\Http\Controllers;
use App\Models\EmergencyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmergencyContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emergency_infos = EmergencyContact::orderBy('emergency_id','desc');
        $keyword = $request->q;
        if (!empty($keyword)) {
            $emergency_infos->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('phone', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                ->orWhere('gps_pin', 'LIKE', '%' . $keyword . '%')
                ->orWhere('address', 'LIKE', '%' . $keyword . '%');
        }

        $emergency_infos = $emergency_infos->paginate(12)->withQueryString();

        return view('admin.emergencycontact.index',['title'=>'Contact Information', 'emergency_infos'=> $emergency_infos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.emergencycontact.create',['title' => 'Add Contact Information']);
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

            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'gps_pin'=>'required',
            'address'=>'required'
        ]);

        $emergency_contact = new EmergencyContact();
        $emergency_contact->name = $request->name;
        $emergency_contact->phone = $request->phone;
        $emergency_contact->email = $request->email;
        $emergency_contact->gps_pin = $request->gps_pin;
        $emergency_contact->address = $request->address;
        $emergency_contact->adres_description = $request->adres_description;

        $emergency_contact->save();
        Session::flash('status', 'Success');
        Session::flash('message', 'Emergency Contact Added Successfully');
        return redirect()->route('emergency-contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emergecny_contacts = EmergencyContact::find($id);
        return view('admin.emergencycontact.edit',['title' => 'Edit Contact Information', 'emergecny_contacts' => $emergecny_contacts]);
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
        $request->validate([

            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'gps_pin'=>'required',
            'address'=>'required'
        ]);
        $emergency_contact = EmergencyContact::find($id);

        $emergency_contact->name = $request->name;
        $emergency_contact->phone = $request->phone;
        $emergency_contact->email = $request->email;
        $emergency_contact->gps_pin = $request->gps_pin;
        $emergency_contact->address = $request->address;
        $emergency_contact->adres_description = $request->adres_description;

        $emergency_contact->save();
        Session::flash('status', 'Success');
        Session::flash('message', 'Emergency Contact Updated Successfully');
        return redirect()->route('emergency-contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emergency_contact = EmergencyContact::find($id);

        $emergency_contact->delete();
        Session::flash('status', 'Success');
        Session::flash('message', 'Emergency Contact Deleted Successfully');
        return redirect()->back();
    }
}
