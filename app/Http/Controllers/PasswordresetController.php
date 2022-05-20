<?php

namespace App\Http\Controllers;

use App\Mail\PasswordReset;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;




class PasswordresetController extends Controller
{

    /**
     * 
     * show reset link page
     * 
     * @return view
     * 
     */
    public function reset_link_page()
    {
        return view('admin.reset');
    }

    /**
     * 
     * send_reset_link method
     * 
     * send password reset link to user to reset password
     * 
     * @return boolen
     * 
     */

    public function send_reset_link(Request $request)
    {

        $request->validate([

            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!is_null($user)) {

            $user->password_reset_toekn = md5(Carbon::now()) . uniqid();
            $user->save();
            Mail::to($user->email)->send(new PasswordReset($user));
            Session::flash('message', 'We sent a reset link to your email, Please check your email and reset password:');
            return redirect()->back();
        } else {
            Session::flash('error', 'something went wrong!');
            return redirect()->back();
        }
    }

    /**
     * 
     * password_reset_page method
     * 
     * @return view page to reset passowrd
     * 
     */
    public function password_reset_page()
    {
        $request_token = $_GET['token'];
        $user = User::where('password_reset_toekn', $request_token)->first();
        if (!is_null($user)) {
            return view('admin.mail.password_reset', compact('request_token'));
        } else {
            Session::flash('error', 'Invalid token!');
            return redirect()->route('reset_link_page');
        }
    }

    /**
     * 
     * password_reset method
     * 
     * @param $request
     * 
     * @return boolen
     * 
     */

    public function password_reset(Request $request)
    {

        $request->validate([

            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::where('password_reset_toekn', $request->request_token)->first();
        if (!is_null($user)) {

            $user->password = Hash::make($request->password);
            $user->password_reset_toekn = NULL;
            $user->save();
            Session::flash('message', 'please login with your new password');
            return redirect()->route('login_page');
        } else {
            Session::flash('error', 'Invalid token!');
            return redirect()->route('reset_link_page');
        }
    }
}
