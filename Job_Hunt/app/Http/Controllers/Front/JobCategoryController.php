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
        $job_categories_data = JobCategory::withCount('rJob')->orderBy('r_job_count', 'desc')->get();
        $job_category_page_data = PageJobCategoryItem::where('id', 1)->first();
        return view('front.job_categories', compact('job_categories_data', 'job_category_page_data'));
    }
}
