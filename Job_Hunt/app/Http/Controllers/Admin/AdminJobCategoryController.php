<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class AdminJobCategoryController extends Controller
{
    //
    public function index() {
        $job_categories = JobCategory::get();
        return view('admin.job_category', compact('job_categories'));
    }

    public function create() {
        return view('admin.job_category_create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $obj = new JobCategory();
        $obj->name = $request->name;
        $obj->icon = $request->icon;
        $obj->save();

        return redirect()->route('admin_job_category_create')->with('success', 'Data is saved successfully');
    }

    public function edit($id) {
        $job_category_single = JobCategory::where('id', $id)->first();
        return view('admin.job_category_edit', compact('job_category_single'));
    }

    public function update(Request $request, $id) {
        $job_category_single = JobCategory::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $job_category_single->name = $request->name;
        $job_category_single->icon = $request->icon;
        $job_category_single->update();

        return redirect()->route('admin_job_category')->with('success', 'Data is updated successfully');
    }

    public function delete($id) {
        JobCategory::where('id', $id)->delete();
        return redirect()->route('admin_job_category')->with('success', 'Data is deleted successfully');
    }
}
