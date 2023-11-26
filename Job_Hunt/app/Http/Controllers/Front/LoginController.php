<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        $other_page_data = PageOtherItem::where('id', 1)->first();
        return view('front.login', compact('other_page_data'));
    }

    public function company_login_submit(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::guard('company')->attempt($credential)) {
            return redirect()->route('company_dashboard');
        }else{
            return redirect()->route('login')->with('success', 'Information is not correct');
        }
    }

}
