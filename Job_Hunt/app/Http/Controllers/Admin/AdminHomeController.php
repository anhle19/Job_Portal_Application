<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateApplication;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    //
    public function index()
    {
        $total_companies = Company::where('status', 1)->count();
        $total_candidates = Candidate::where('status', 1)->count();
        $total_jobs = Job::get()->count();
        $total_applications = CandidateApplication::get()->count();
        $total_approved = CandidateApplication::where('status', 'Approved')->get()->count();
        $total_rejected = CandidateApplication::where('status', 'Rejected')->get()->count();
        $job_categories = JobCategory::withCount('rJob')->get();
        return view(
            'admin.home',
            compact(
                'total_companies',
                'total_candidates',
                'total_jobs',
                'total_applications',
                'total_approved',
                'total_rejected',
                'job_categories'
            )
        );
    }

    public function detail($id) {
        $category_name = JobCategory::where('id', $id)->first()->name;
        //Lấy ra các job của category
        $jobs = Job::with('rCompany')->where('job_category_id', $id)->get();
        //Lấy ra thông tin application của category
        $data = DB::table('candidate_applications')->join('jobs','candidate_applications.job_id','jobs.id')
        ->where('jobs.job_category_id',$id)->get();

        $total_applications = $data->count();
        $total_approved = $data->where('status','Approved')->count();
        $total_rejected = $data->where('status','Rejected')->count();

        return view('admin.home_detail', compact('category_name','jobs','total_applications','total_approved','total_rejected'));
    }
}
