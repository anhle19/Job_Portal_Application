<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function dashboard() {
        return view('candidate.dashboard');
    }

    public function logout() {
        Auth::guard('candidate')->logout();
        return redirect()->route('login');
    }
}
