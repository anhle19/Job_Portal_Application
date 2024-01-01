<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Advertisement;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobLocation;
use App\Models\JobSalaryRange;
use App\Models\JobType;
use App\Models\Order;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobListingController extends Controller
{
    //
    public function index(Request $request)
    {
        $jobs = Job::with('rCompany', 'rJobCategory', 'rJobLocation', 'rJobType', 
        'rJobExperience', 'rJobGender', 'rJobSalaryRange')->orderBy('id', 'desc');

        $other_page_data = PageOtherItem::where('id', 1)->first();
        $job_locations = JobLocation::orderBy('id', 'asc')->get();
        $job_categories = JobCategory::orderBy('id', 'asc')->get();
        $job_types = JobType::orderBy('id', 'asc')->get();
        $job_experiences = JobExperience::orderBy('id', 'asc')->get();
        $job_genders = JobGender::orderBy('id', 'asc')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id', 'asc')->get();
        $advertisement = Advertisement::where('id', 1)->first();

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
            'form_data',
            'advertisement',
            'other_page_data'
        ));
    }

    public function detail($id) {
        
        //Kiểm tra ngày hết hạn nếu có package
        // $company_id = $job_single->company_id;
        // $order_data = Order::where('company_id', $company_id)->where('currently_active', 1)->first();
        // if(date('Y-m-d') > $order_data->expire_date) {
        //     return redirect()->route('home');
        // } 
        $job_single = Job::with('rCompany', 'rJobCategory', 'rJobLocation', 'rJobType', 
        'rJobExperience', 'rJobGender', 'rJobSalaryRange')->where('id', $id)->first();
        $jobs = Job::with('rCompany', 'rJobCategory', 'rJobLocation', 'rJobType', 
        'rJobExperience', 'rJobGender', 'rJobSalaryRange')->where('job_category_id', $job_single->job_category_id)->orderBy('id', 'desc')->take(3)->get();
        $other_page_data = PageOtherItem::where('id', 1)->first();

        return view('front.job', compact('job_single','jobs', 'other_page_data'));
    }

    public function send_email(Request $request) {
        $request->validate([
            'visitor_name' => 'required',
            'visitor_email' => 'required|email',
            'visitor_phone' => 'required',
            'visitor_message' => 'required'
        ]);

        $subject = 'Enquery for job: '.$request->job_title;
        $message = 'Visitor Information: <br>';
        $message .= 'Name: '.$request->visitor_name.'<br>';
        $message .= 'Email: '.$request->visitor_email.'<br>';
        $message .= 'Phone: '.$request->visitor_phone.'<br>';
        $message .= 'Message: '.$request->visitor_message;

        $data = array(
            'subject' => $subject,
            'message' => $message,
        );

        Mail::to($request->receive_email)->send(new Websitemail($data));

        return redirect()->back()->with('success', 'Email is sent successfully!');
    }
}
