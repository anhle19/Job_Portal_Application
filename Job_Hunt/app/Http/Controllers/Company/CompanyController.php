<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function dashboard() {
        return view('company.dashboard');
    }

    public function logout() {
        Auth::guard('company')->logout();
        return redirect()->route('login');
    }

    public function company_make_payment() {
        return view('company.make_payment');
    }
}
