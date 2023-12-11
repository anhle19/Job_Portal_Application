<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\WhyChooseItem;
use App\Models\Testimonial;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function index() {
        $home_page_data = PageHomeItem::where('id', 1)->first();
        $job_category_data = JobCategory::orderBy('name', 'ASC')->take(9)->get();
        $job_location_data = JobLocation::orderBy('name', 'ASC')->get();
        $all_job_category = JobCategory::orderBy('name', 'ASC')->get();
        $all_job_location = JobLocation::orderBy('name', 'ASC')->get();
        $why_choose_data = WhyChooseItem::get();
        $testimonials = Testimonial::get();
        $posts = Post::take(3)->get();
        
        return view('front.home', compact('home_page_data', 'job_category_data', 'job_location_data', 'all_job_category', 'all_job_location', 'why_choose_data', 'testimonials', 'posts'));
    }
}
