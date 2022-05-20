<?php

namespace App\Http\Controllers;

use App\Models\Teststation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TstationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tstations = Teststation::orderBy('teststation_id','desc');
        $keyword = $request->q;
        if (!empty($keyword)) {
            $tstations->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('type', 'LIKE', '%' . $keyword . '%')
                ->orWhere('unique_id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('contact_name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('mobile_number', 'LIKE', '%' . $keyword . '%')
                ->orWhere('words', 'LIKE', '%' . $keyword . '%')
                ->orWhere('country', 'LIKE', '%' . $keyword . '%')
                ->orWhere('sub_country', 'LIKE', '%' . $keyword . '%');
        }

        $tstations = $tstations->paginate(10)->withQueryString();

        return view('admin.tstation.index', ['title' => 'Teststation', 'tstations' => $tstations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_county = DB::table('counties')->get();
        return view('admin.tstation.create', ['title' => 'Create Teststation', 'all_county' => $all_county]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //  return $request->all();


        $request->validate([

            'name' => 'required',
            'type' => 'required',
            'contact_name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|unique:teststations',
            'po_box' => 'required',
            // 'city' => 'required',
            'country' => 'required',
            'sub_country' => 'required',
            'words' => 'required',
            'location' => 'required'
        ]); 

         
 

        //Tstation::create($request->all());
        $tstation = new Teststation();
        $tstation->name = $request->name;
        $tstation->unique_id = uniqid();
        $tstation->type = implode(",", $request->type);
        $tstation->contact_name = $request->contact_name;
        $tstation->mobile_number = $request->mobile_number;
        $tstation->email = $request->email;
        $tstation->po_box = $request->po_box;
        $tstation->country = $request->country;
        $tstation->sub_country = $request->sub_country;
        $tstation->words = $request->words;
        $tstation->location = $request->location;
        $tstation->gps_pin = $request->lattlang;
        $tstation->save();
        Session::flash('status', 'Success');
        Session::flash('message', 'teststaion created successfully');
       
        return redirect()->route('tstation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tstation = Teststation::find($id);
        // return $tstation;
        return view('admin.tstation.show', ['title' => 'Teststation', 'tstation' => $tstation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tstation = Teststation::find($id);
        $all_county = DB::table('counties')->get();
        return view('admin.tstation.edit', ['title' => 'Update Teststation', 'tstation' => $tstation, 'all_county' => $all_county]);
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

        $request->validate([

            'name' => 'required',
            'type' => 'required',
            'contact_name' => 'required',
            'mobile_number' => 'required',
            'email' => 'required|unique:tstations',
            'email' => 'required',
            'po_box' => 'required',
            'words' => 'required',
            'country' => 'required',
            'sub_country' => 'required',
            'location' => 'required',
        ]);



        //Tstation::create($request->all());
        $tstation = Teststation::find($id);
        $tstation->name = $request->name; 
        $tstation->type = implode(",", $request->type);
        $tstation->contact_name = $request->contact_name;
        $tstation->mobile_number = $request->mobile_number;
        $tstation->email = $request->email;
        $tstation->po_box = $request->po_box;
        $tstation->country = $request->country;
        $tstation->sub_country = $request->sub_country;
        $tstation->words = $request->words;
        $tstation->location = $request->location;
        $tstation->gps_pin = $request->lattlang;
        $tstation->save();
       
        Session::flash('status', 'Success');
        Session::flash('message', 'tstaion updated successfully');
        return redirect()->route('tstation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tstation = Teststation::find($id);
        $tstation->delete();
        Session::flash('status', 'Success');
        Session::flash('message', 'tstaion deleted successfully');
        return redirect()->back();
    }
}
