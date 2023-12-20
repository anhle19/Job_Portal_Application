<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\JobExperience;

class AdminJobExperienceController extends Controller
{
    public function index() {
        $job_experiences = JobExperience::get();
        return view('admin.job_experience', compact('job_experiences'));
    }

    public function create() {
        return view('admin.job_experience_create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new JobExperience();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_experience_create')->with('success', 'Data is saved successfully');
    }

    public function edit($id) {
        $job_experience_single = JobExperience::where('id', $id)->first();
        return view('admin.job_experience_edit', compact('job_experience_single'));
    }

    public function update(Request $request, $id) {
        $job_experience_single = JobExperience::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
        ]);

        $job_experience_single->name = $request->name;
        $job_experience_single->update();

        return redirect()->route('admin_job_experience')->with('success', 'Data is updated successfully');
    }

    public function delete($id) {
        $check = Job::where('job_experience_id', $id)->count();
        if($check > 0) {
            return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
        }
        JobExperience::where('id', $id)->delete();
        return redirect()->route('admin_job_experience')->with('success', 'Data is deleted successfully');
    }
}
