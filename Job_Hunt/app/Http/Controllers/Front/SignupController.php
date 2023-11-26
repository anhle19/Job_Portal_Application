<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use App\Models\Company;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function index() {
        $other_page_data = PageOtherItem::where('id', 1)->first();
        return view('front.signup', compact('other_page_data'));
    }

    public function company_signup_submit(Request $request) {

        $admin_data = Admin::where('id', 1)->first();
        $request->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'username' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        //token used to validate email
        $token = hash('sha256', time());

        $obj = new Company();
        $obj->company_name = $request->company_name;
        $obj->person_name = $request->person_name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->status = 0;
        $obj->token = $token;
        $obj->save();

        //Email validation
        $verify_link = url('company_signup_verify/'.$token.'/'.$request->email);
        $subject = 'Company Signup Verification';
        $message = 'Please click the following link: <br>';
        $message .= '<a href="'.$verify_link.'">Click here</a>';

        $data = array(
            'subject' => $subject,
            'message' => $message,
        );

        Mail::to($admin_data->email)->send(new Websitemail($data));

        return redirect()->route('login')->with('success', 'An email has been sent to your email address. Please veritify your email.');
    }

    public function company_signup_verify($token, $email) {
        $company_data = Company::where('token', $token)->where('email', $email)->first();
        if(empty($company_data)) {
            return redirect()->route('login');
        }

        $company_data->token = '';
        $company_data->status = 1;
        $company_data->update();

        return redirect()->route('login')->with('success', 'Your email is verified successfully.');
    }
}
