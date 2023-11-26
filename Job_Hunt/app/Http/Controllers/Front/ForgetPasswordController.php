<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function company_forget_password() {
        $other_page_data = PageOtherItem::where('id', 1)->first();
        return view('front.forget_password_company', compact('other_page_data'));
    }

    public function company_forget_password_submit(Request $request) {
        $request->validate([
            'email' => 'required',
        ]);

        $company_data = Company::where('email', $request->email)->first();
        if(empty($company_data)) {
            return redirect()->back()->with('error', 'Email address not found');
        }

        $token = hash('sha256', time());
        $company_data->token = $token;
        $company_data->update();

        $reset_link = url('/reset-password/company/'.$token.'/'.$request->email);
        //Email content
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="'.$reset_link.'">Click here</a>';
        $data = array(
            'subject' => $subject,
            'message' => $message,
        );
        //Send email
        Mail::to($request->email)->send(new Websitemail($data));
        return redirect()->route('login')->with('success', 'Please check your email and follow these steps');
    }

    public function reset_password_company($token, $email) { 
        //Check token and email
        $company_data = Company::where('token', $token)->where('email', $email)->first();
        if (empty($company_data)) {
            return redirect()->route('login');
        }
        //Call view with token and email
        return view('front.reset_password_company', compact('token', 'email'));
    }

    public function reset_password_company_submit(Request $request) {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        //Token and Email were input hidden UI
        $company_data = Company::where('token', $request->token)->where('email', $request->email)->first();
        
        $company_data->password = Hash::make($request->password);
        $company_data->token = '';
        $company_data->update();

        return redirect()->route('login')->with('success', 'Password is reset successfully');
    }
}
