<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateApplication;
use App\Models\CandidateAward;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateResume;
use App\Models\CandidateSkill;
use App\Models\Company;
use App\Models\CompanyPhoto;
use App\Models\CompanyVideo;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    public function index() {
        $companies = Company::where('status', 1)->get();
        return view('admin.companies', compact('companies'));
    }

    public function companies_detail($id) {
        $company_detail = Company::with('rCompanyLocation', 'rCompanySize', 'rCompanyIndustry')->where('id', $id)->first();
        $photos = CompanyPhoto::where('company_id', $id)->get();
        $videos = CompanyVideo::where('company_id', $id)->get();
        return view('admin.companies_detail', compact('company_detail', 'photos', 'videos'));
    }

    public function companies_jobs($id) {
        $company_detail = Company::where('id', $id)->first();
        $company_jobs = Job::with('rJobCategory', 'rJobLocation', 'rCompany')->where('company_id', $id)->get();
        return view('admin.companies_jobs', compact('company_jobs','company_detail'));
    }

    public function companies_applicants($id) {
        $applicants = CandidateApplication::with('rCandidate')->where('job_id', $id)->get();
        $job_single = Job::where('id', $id)->first();
        return view('admin.companies_applicants', compact('applicants', 'job_single'));
    }

    public function companies_applicants_resume($id) {
        $candidate_single = Candidate::where('id', $id)->first();
        $educations = CandidateEducation::where('candidate_id', $id)->get();
        $skills = CandidateSkill::where('candidate_id', $id)->get();
        $experiences = CandidateExperience::where('candidate_id', $id)->get();
        $awards = CandidateAward::where('candidate_id', $id)->get();
        $resumes = CandidateResume::where('candidate_id', $id)->get();

        return view('admin.companies_applicants_resume', compact('candidate_single', 'educations', 'skills', 'experiences', 'awards', 'resumes'));
    }
}
