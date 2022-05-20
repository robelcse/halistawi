<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users   = User::orderBy('id', 'desc');
        $keyword = $request->q;
        if (!empty($keyword)) {
            $users->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('gender', 'LIKE', '%' . $keyword . '%')
                ->orWhere('mobile_number', 'LIKE', '%' . $keyword . '%')
                ->orWhere('national_id', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                ->orWhere('role', 'LIKE', '%' . $keyword . '%');
        }

        $users = $users->paginate(12)->withQueryString();
        return view('admin.user.index', ['title' => 'user list', 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', ['title' => 'Add new user']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regsiter_credential =  $request->validate([

            'name'          => 'required',
            'national_id'   => 'required|numeric|max:999999999999999',
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'role'          => 'required',
            'email'         => 'required|email|unique:users',
            'mobile_number' => 'required',
            'password'      => 'required|confirmed|min:6',
            'photo'         => 'required|mimes:jpg,jpeg,png,gif'
        ]);


        //image upload
        $user_file = $request->file('photo');
        $user_slug = Str::slug($request->name);

        if (isset($user_file)) {
            $currentDate   = Carbon::now()->toDateString();
            $user_filename = $user_slug . '-' . $currentDate . '-' . uniqid() . '.' . $user_file->getClientOriginalExtension();
            if (!file_exists('uploads/users')) {
                mkdir('uploads/users', 0777, true);
            }
            $user_file->move('uploads/users', $user_filename);
        } else {
            $user_filename = NULL;
        }

        $user                = new User();
        $user->name          = $request->name;
        $user->email         = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender        = $request->gender;
        $user->role          = $request->role;
        $user->national_id   = $request->national_id;
        $user->mobile_number = $request->mobile_number;
        $user->photo         = $user_filename;
        $user->password      = Hash::make($request->password);
        $user->save();
        Session:: flash('status', 'Success!');
        Session:: flash('message', 'User Created Successfully');
        return redirect()->route('admin.index');
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
        $user = User::find($id);
        return view('admin.user.edit', ['title' => 'Update user', 'user' => $user]);
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

        // return $request->all();

        $request->validate([

            'name'          => 'required',
            'national_id'   => 'required|numeric|max:999999999999999',
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'email'         => 'required|email|unique:users,email,' . $id,
            // 'email' => 'unique:users,email_address,' . $userId,
            'mobile_number' => 'required',
            'password'      => 'nullable|min:6',
            'photo'         => 'mimes:jpg,jpeg,png,gif,webp'
        ]);

        $user = User::find($id);
        //image upload
        $user_file = $request->file('photo');
        $user_slug = Str::slug($request->name);

        if (isset($user_file)) {
            $currentDate   = Carbon::now()->toDateString();
            $user_filename = $user_slug . '-' . $currentDate . '-' . uniqid() . '.' . $user_file->getClientOriginalExtension();
            if (!file_exists('uploads/users')) {
                mkdir('uploads/users', 0777, true);
            }
            if ($user->photo != NULL) {
                unlink('uploads/users/' . $user->photo);
            }
            $user_file->move('uploads/users', $user_filename);
        } else {
            $user_filename = $user->photo;
        }


        $user->name          = $request->name;
        $user->email         = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender        = $request->gender;
        $user->national_id   = $request->national_id;
        $user->mobile_number = $request->mobile_number;
        $user->photo         = $user_filename;
        if ($request->password) {
           $user->password = Hash::make($request->password);
        }
        if($request->role){
            $user->role = $request->role;
        }
        $user->save();
        Session:: flash('status', 'Success!');
        Session:: flash('message', 'User Updated Successfully');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (file_exists('uploads/users/' . $user->photo)) {
            unlink('uploads/users/' . $user->photo);
        }
        $user->delete();
        Session:: flash('status', 'Success');
        Session:: flash('message', 'User Deleted Successfully');
        return redirect()->back();
    }
}
