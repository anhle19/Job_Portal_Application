<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageHomeItem;

class AdminHomePageController extends Controller
{
    public function index() {
        $page_home_data = PageHomeItem::where('id', 1)->first();
        return view('admin.page_home', compact('page_home_data'));
    }

    public function update(Request $request) {
        $page_home_data = PageHomeItem::where('id', 1)->first();

        $request->validate([
            'heading' => 'required',
            'job_title' => 'required',
            'job_category' => 'required',
            'job_location' => 'required',
            'search' => 'required',
        ]);

        //Update photo
        if ($request->hasFile('background')) {
            $request->validate([
                'background' => 'required|mimes:png,jpg,jpeg,gif'
            ]);

            //Remove the old photo
            unlink(public_path('uploads/'.$page_home_data->background));
            //Get extension of the new photo
            $ext = $request->file('background')->extension();
            $final_name = 'banner_home'.'.'.$ext;

            //Move the new photo
            $request->file('background')->move(public_path('uploads/'),$final_name);
            $page_home_data->background = $final_name;
        }

        $page_home_data->heading = $request->heading;
        $page_home_data->text = $request->text;
        $page_home_data->job_title = $request->job_title;
        $page_home_data->job_category = $request->job_category;
        $page_home_data->job_location = $request->job_location;
        $page_home_data->search = $request->search;
        $page_home_data->update();

        return redirect()->back()->with('success', 'Data information is saved successfully.');
    }
}
