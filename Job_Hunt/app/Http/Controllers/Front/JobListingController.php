<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobLocation;
use App\Models\JobSalaryRange;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    //
    public function index(Request $request)
    {
        $jobs = Job::with('rCompany', 'rJobCategory', 'rJobLocation', 'rJobType', 
        'rJobExperience', 'rJobGender', 'rJobSalaryRange')->orderBy('id', 'desc');

        $job_locations = JobLocation::orderBy('id', 'asc')->get();
        $job_categories = JobCategory::orderBy('id', 'asc')->get();
        $job_types = JobType::orderBy('id', 'asc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'asc')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id', 'asc')->get();

        $form_data = array(
            'title' => $request->title,
            'location' => $request->location,
            'category' => $request->category,
            'type' => $request->type,
            'experience' => $request->experience,
            'gender' => $request->job_gender,
            'salary_range' => $request->job_salary_range
        );

        if ($request->title != null) {
            $jobs = $jobs->where('title', 'LIKE', '%' . $request->title . '%');
        }

        if ($request->location != null) {
            $jobs = $jobs->where('job_location_id', $request->location);
        }

        if ($request->category != null) {
            $jobs = $jobs->where('job_category_id', $request->category);
        }

        if ($request->type != null) {
            $jobs = $jobs->where('job_type_id', $request->type);
        }

        if ($request->experience != null) {
            $jobs = $jobs->where('job_experience_id', $request->experience);
        }

        if ($request->job_gender != null) {
            $jobs = $jobs->where('job_gender_id', $request->job_gender);
        }

        if ($request->job_salary_range != null) {
            $jobs = $jobs->where('job_salary_range_id', $request->job_salary_range);
        }

        $jobs = $jobs->paginate(9);

        return view('front.job_listing', compact(
            'jobs',
            'job_locations',
            'job_categories',
            'job_types',
            'job_experiences',
            'job_genders',
            'job_salary_ranges',
            'form_data'
        ));
    }

    public function job($id) {
        $job_single = Job::with('rCompany', 'rJobCategory', 'rJobLocation', 'rJobType', 
        'rJobExperience', 'rJobGender', 'rJobSalaryRange')->where('id', $id)->first();

        return view('front.job', compact('job_single'));
    }
}
