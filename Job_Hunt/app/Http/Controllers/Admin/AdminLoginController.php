<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{
    //
    public function index() {
        return view('admin.login');
    }

    public function forget_password() {
        return view('admin.forget_password');
    }

    /**
     * Submit the login information
     * Redirect to admin-home with admin_data
     * Redirect to admin_login
     */
    public function login_submit(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin_home');
        } else {
            return redirect()->route('admin_login')->with('error', 'Information is not correct!');
        }
    }

    /**
     * Submit the email for reset password
     * Send email to reset password
     * Redirect to back with error or success message
     */
    public function forget_password_submit(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);

        //Get tha data of admin
        $admin_data = Admin::where('email', $request->email)->first();
        if (empty($admin_data)) {
            return redirect()->back()->with('error', 'Email address not found!');
        }

        //Hash the token to reset password
        $token = hash('sha256', time());
        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        //Email content
        $subject = 'Reset Password';
        $message = 'Click here to reset your password';
        $data = array(
            'subject' => $subject,
            'content' => $message,
            'reset_link' => $reset_link
        );
        //Send email
        Mail::to($request->email)->send(new Websitemail($data));
        return redirect()->route('admin_login')->with('success', 'Please check your email and follow these steps');
    }

    /**
     * Reset password form reset link
     * Call view with data
     */
    public function reset_password($token, $email) { 
        //Check token and email
        $admin_data = Admin::where('token', $token)->where('email', $email)->first();
        if (empty($admin_data)) {
            return redirect()->route('admin_login');
        }
        //Call view with token and email
        return view('admin.reset_password', compact('token', 'email'));
    }

    /**
     * Submit new password to reset
     * Update admin data
     * Call admin_login view with success message
     */
    public function reset_password_submit(Request $request) {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        //Token and Email were input hidden UI
        $admin_data = Admin::where('token', $request->token)->where('email', $request->email)->first();
        
        $admin_data->password = Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();

        return redirect()->route('admin_login')->with('success', 'Password is reset successfully');
    }

    /**
     * Logout and return to admin_login
     */
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
