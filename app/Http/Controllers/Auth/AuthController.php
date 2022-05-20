<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AuthRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * 
 * Authenticatio Hanlder Class
 * 
 */

class AuthController extends Controller
{

    public $auth_repository;

    /**
     * 
     * constructor method
     * 
     * @return instance of AuthRepository class
     * 
     */

    public function __construct(AuthRepository $auth_repository)
    {
        $this->auth_repository = $auth_repository;
    }

    /**
     * 
     * it will call if authurization is successfull
     * 
     * @param String $token
     * @param Object $data
     *  
     * @return json Object
     * 
     */

    protected function jsonSuccess($token, $data)
    {
        return response()->json([
            'status'      => 'success',
            'status_code' => 200,
            'token'       => $token,
            'data'        => $data
        ]);
    }

    /**
     * 
     * it will call if authurization is fail
     *  
     * @return json Object
     * 
     */

    protected function jsonError()
    {
        return response()->json([
            'status'      => 'fail',
            'status_code' => 401
        ]);
    }

    /**
     * aide will be register when call it
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     * @return json data with status code[200 if success, 401 if fail]
     * 
     */

    public function aideRegister(Request $request)
    {

        //validate requesting data
        $request->validate([
            'name'        => 'required|string|min:4|max:100',
            'email'       => 'required|string|unique:users|email',
            'national_id' => 'required|numeric|unique:users|min:4',
        ]);
        //make instance of user model        
        $user                = new User();
        $user->name          = $request->name;
        $user->email         = $request->email;
        $user->gender        = $request->gender ? $request->gender : NULL;
        $user->date_of_birth = $request->date_of_birth ? $request->date_of_birth : NULL;
        $user->mobile_number = $request->mobile_number ? $request->mobile_number : NULL;
        $user->photo         = $request->photo ? $request->photo : NULL;
        $user->national_id   = $request->national_id;
        $user->password      = $request->password ? Hash::make($request->password) : Hash::make($request->national_id);
        $user->role          = 'aide';
        $user->save();
        //check if aide register or not then return response
        if (!is_null($user)) {
            $token = $user->createToken('apptoken')->plainTextToken;
            $user = $this->auth_repository->findUserByEmail($request->email);
            return $this->jsonSuccess($token, $user);
        } else {
            return $this->jsonError();
        }
    }

    /**
     * 
     * aide will be login when it call
     * 
     * @param \Illuminate\Http\Request $request
     *
     * @return Boolean
     *
     */

    public function aideLogin(Request $request)
    {
        //validate request data
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required'
        ]);

        //check user exist or not in the database
        $user =  User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->jsonError();
        } else {
            $token = $user->createToken('apptoken')->plainTextToken;
            return $this->jsonSuccess($token, $user);
        }
    }

    /**
     * patient will be register when call it
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     * @return json data with status code[200 if success, 401 if fail]
     * 
     */

    public function patientRegister(Request $request)
    {
        //validate request data
        $request->validate([
            'name' => 'required|string|min:4|max:100',
            'email' => 'email',
            'national_id' => 'required|numeric|unique:users|min:4',
        ]);

        $user = $this->auth_repository->register($request);
        if (!is_null($user)) {
            $token = $user->createToken('apptoken')->plainTextToken;
            $user = $this->auth_repository->findUserByEmail($request->email);
            return $this->jsonSuccess($token, $user);
        } else {
            return $this->jsonError();
        }
    }

    /**
     * 
     * patient will be login when it call
     * 
     * @param \Illuminate\Http\Request $request
     *
     * @return Boolean
     *
     */

    public function patientLogin(Request $request)
    {

        //validate request data
        $request->validate([
            'national_id' => 'required|string',
            'password' => 'required'
        ]);
        //check if user exist or not
        $user =  User::where('national_id', $request->national_id)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->jsonError();
        } else {
            $user = User::where('national_id', $request->national_id)->first();
            $token = $user->createToken('apptoken')->plainTextToken;
            return $this->jsonSuccess($token, $user);
        }
    }

    /**
     * 
     * authenticated user will be logedout when call it
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolen
     * 
     */
    public function logout(Request $request)
    {
        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'message' => 'Successfully logged out'
        ]);
    }
}
