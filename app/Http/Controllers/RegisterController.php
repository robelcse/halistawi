<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Carbon\Carbon;


/**
 * 
 * Registraion hanlder class
 * 
 */

class RegisterController extends Controller
{

    /**
     * 
     * show register page
     * 
     * @return view
     * 
     */
    public function register_page()
    {
        return view('admin.register');
    }

    /**
     * 
     * user registration 
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     * 
     */

    public function register(Request $request)
    {

        $regsiter_credential =  $request->validate([

            'name'          => 'required',
            'national_id'   => 'required|numeric|max:999999999999999',
            'mobile_number' => 'required|string',
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|confirmed|min:6',
            'photo'         => 'mimes:jpg,jpeg,png,gif'
        ]);

        $file = $request->file('photo');
        $slug = Str::slug($request->name);

        if (isset($file)) {
            $currentDate = Carbon::now()->toDateString();
            $filename    = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            if (!file_exists('uploads/users')) {
                mkdir('uploads/users', 0777, true);
            }
            $file->move('uploads/users', $filename);
        } else {
            $filename = NULL;
        }

        // return $request->all();
        $user                = new User();
        $user->name          = $request->name;
        $user->email         = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender        = $request->gender;
        $user->national_id   = $request->national_id;
        $user->mobile_number = $request->mobile_number;
        $user->photo         = $filename;
        $user->password      = Hash::make($request->password);
        $user->save();
        Session:: flash('message', 'registraion successfull');
        return redirect()->route('login_page');
    }
}
