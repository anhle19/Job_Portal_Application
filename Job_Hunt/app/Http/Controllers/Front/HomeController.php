<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use App\Models\JobCategory;

class HomeController extends Controller
{
    //
    public function index() {
        $home_page_data = PageHomeItem::where('id', 1)->first();
        $job_category_data = JobCategory::orderBy('name', 'ASC')->take(9)->get();
        return view('front.home', compact('home_page_data', 'job_category_data'));
    }
}
