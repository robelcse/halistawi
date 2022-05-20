<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


/**
 * 
 * login and logout handler class
 * 
 */

class LoginController extends Controller
{

    /**
     * 
     * show login page
     * 
     * @return view
     * 
     */

    public function login_page()
    {

        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('admin.login', ['title' => 'Login']);
        }
    }

    /**
     * 
     * login process
     * 
     * @return boolen
     */

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user =  User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            Session::flash('error', 'credentials does not match our records!');
            return redirect()->back()->withInput($request->input());
        } else {
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            $request->session()->regenerate();
            Session::flash('status', 'Success!');
            Session::flash('message', 'Login success!');
            return redirect()->route('dashboard');
        }
    }

    /**
     * 
     * logout method
     * 
     * @return redirect to login page 
     * 
     */

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
