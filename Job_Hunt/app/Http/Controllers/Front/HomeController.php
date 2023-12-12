<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\PageHomeItem;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\WhyChooseItem;
use App\Models\Testimonial;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function index()
    {
        $home_page_data = PageHomeItem::where('id', 1)->first();
        $job_category_data = JobCategory::withCount('rJob')->orderBy('r_job_count', 'desc')->take(9)->get();
        $job_location_data = JobLocation::orderBy('name', 'asc')->get();
        $all_job_category = JobCategory::orderBy('name', 'asc')->get();
        $all_job_location = JobLocation::orderBy('name', 'asc')->get();
        $why_choose_data = WhyChooseItem::get();
        $testimonials = Testimonial::get();
        $posts = Post::take(3)->get();
        $featured_jobs = Job::with(
            'rCompany',
            'rJobCategory',
            'rJobLocation',
            'rJobType',
            'rJobExperience',
            'rJobGender',
            'rJobSalaryRange'
        )->where('is_featured', 1)->orderBy('id', 'desc')->take(6)->get();

        return view('front.home', compact('home_page_data', 'job_category_data', 'job_location_data', 
        'all_job_category', 'all_job_location', 'why_choose_data', 'testimonials', 'posts', 'featured_jobs'));
    }
}
