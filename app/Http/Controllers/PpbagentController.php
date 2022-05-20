<?php

namespace App\Http\Controllers;

use App\Models\Ppbagent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class PpbagentController extends Controller
{

    /**
     * 
     * index method
     * 
     * @return list of ppb agent 
     * 
     * 
     */

    public function index(Request $request)
    {
        $ppbagents = Ppbagent::orderBy('ppbagent_id','desc');
        $keyword = $request->q;
        if (!empty($keyword)) {
            $ppbagents->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('pin', 'LIKE', '%' . $keyword . '%')
                ->orWhere('c_12', 'LIKE', '%' . $keyword . '%');
        }

        $ppbagents = $ppbagents->paginate(12)->withQueryString();
        return view('admin.ppbagent.index', ['title' => 'Creaet ppbagent', 'ppbagents' => $ppbagents]);
    }

    /**
     * 
     * create method
     * 
     * @return view page to crate ppb agent information
     * 
     */

    public function create()
    {

        return view('admin.ppbagent.create', ['title' => 'Creaet ppbagent']);
    }

    /**
     * 
     * edit method
     * 
     * @param ppb agent id
     * 
     * @return a view page with single company information
     * 
     */

    public function edit($id)
    {

        $ppbagent = Ppbagent::find($id);
        return view('admin.ppbagent.edit', ['title' => 'Update Ppbagent', 'ppbagent' => $ppbagent]);
    }

    /**
     * 
     * store method
     * 
     * @param $request 
     * 
     * @return reidirect ppb agent list 
     * 
     * 
     */

    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'pin' => 'required',
            'c_12' => 'required',
            //  'notes'=>'required'
        ]);

        $filename = NULL;

        //image upload
        if ($request->hasFile('notes')) {

            $file = $request->file('notes');
            $slug = Str::slug($request->name);
            if (isset($file)) {
                $currentDate = Carbon::now()->toDateString();
                $filename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('public/assets/uploads')) {
                    mkdir('public/assets/uploads', 0777, true);
                }
                $file->move('public/assets/uploads', $filename);
            }
        }

        //return $request->all();

        $ppbagent = new Ppbagent();
        $ppbagent->name = $request->name;
        $ppbagent->pin = $request->pin;
        $ppbagent->c_12 = $request->c_12;
        $ppbagent->notes = $filename;
        $ppbagent->save();
        Session::flash('status', 'Success');
        Session::flash('message', 'Pbb agenet Created Successfully');
        return redirect()->route('ppbagent.index');
    }


    /**
     * 
     * update method
     * 
     * @param Request,$id
     * 
     * return redirect ppbagent list page
     * 
     */



    public function update(Request $request, $id)
    {

        $request->validate([

            'name' => 'required',
            'pin' => 'required',
            'c_12' => 'required',
            //  'notes'=>'required'
        ]);
        //return $request->all();

        $ppbagent = Ppbagent::find($id);

        //file upload
        if ($request->hasFile('notes')) {

            $file = $request->file('notes');
            $slug = Str::slug($request->name);
            if (isset($file)) {
                $currentDate = Carbon::now()->toDateString();
                $filename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                if (!file_exists('public/assets/uploads')) {
                    mkdir('public/assets/uploads', 0777, true);
                }
                if($ppbagent->notes != NULL){
                    unlink('public/assets/uploads/'.$ppbagent->notes);
                }
                $file->move('public/assets/uploads', $filename);
            }
        } else {

            $filename =  $ppbagent->notes;
        }
        $ppbagent->name = $request->name;
        $ppbagent->pin = $request->pin;
        $ppbagent->c_12 = $request->c_12;
        $ppbagent->notes = $filename;
        $ppbagent->save();
        Session::flash('status', 'Success');
        Session::flash('message', 'Ppb agent Updated Successfully');
        return redirect()->route('ppbagent.index');
    }

    public function show($id)
    {
        $ppbagent = Ppbagent::find($id);
        return view('admin.ppbagent.show', ['ppbagent' => $ppbagent]);
    }

    /**
     * 
     * destroy method
     * 
     * @param $id
     * 
     * @return redirect ppbagent list page  
     * 
     */


    public function destroy($id)
    {


        $ppbagent = Ppbagent::find($id);
        if($ppbagent->notes != NULL){
            unlink('public/assets/uploads/'.$ppbagent->notes);
        }
        $ppbagent->delete();
        
        Session::flash('status', 'Success');
        Session::flash('message', 'Pbb agenet Deleted Successfully');
        return redirect()->back();
    }
}
