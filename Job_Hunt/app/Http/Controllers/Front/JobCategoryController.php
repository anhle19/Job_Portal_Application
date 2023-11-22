<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Models\PageJobCategoryItem;

class JobCategoryController extends Controller
{
    //
    public function categories() {
        $job_categories_data = JobCategory::orderBy('name', 'ASC')->get();
        $job_category_page_data = PageJobCategoryItem::where('id', 1)->first();
        return view('front.job_categories', compact('job_categories_data', 'job_category_page_data'));
    }
}
