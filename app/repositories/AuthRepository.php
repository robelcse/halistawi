<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\AuthInterface;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface
{

    /**
     * 
     * check if user authenticated or not
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     * 
     */
    public function checkIfAuthenticated(Request $request)
    {
        $user =  User::where('email', $request->email)->orWhere('national_id', $request->national_id)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 
     * user registration method
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Object of User
     * 
     */

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender ? $request->gender : NULL;
        $user->date_of_birth = $request->date_of_birth ? $request->date_of_birth : NULL;
        $user->mobile_number = $request->mobile_number ? $request->mobile_number : NULL;
        $user->photo = $request->photo ? $request->photo : NULL;
        $user->national_id = $request->national_id;
        $user->password = $request->password ? Hash::make($request->password) : Hash::make($request->national_id);
        $user->role = $request->role ? $request->role : NULL;
        $user->save();

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->gender = $request->gender ? $request->gender : NULL;
        $patient->date_of_birth = $request->date_of_birth ? $request->date_of_birth : NULL;
        $patient->mobile_number = $request->mobile_number ? $request->mobile_number : NULL;
        $patient->photo = $request->photo ? $request->photo : NULL;
        $patient->national_id = $request->national_id;
        $patient->save();
        return $user;
    }

    /**
     * 
     * find user by email address
     * 
     * @param String $email
     * 
     * @return Object of User
     * 
     */

    public function findUserByEmail($email)
    {
        $user = User::where('email', $email)->first();
        return $user;
    }

     /**
     * 
     * find user by national Id
     * 
     * @param Integer $national_id
     * 
     * @return Object of User
     * 
     */

    public function findUserByNationalId($national_id)
    {
        $user = User::where('national_id', $national_id)->first();
        return $user;
    }
}//end class
