<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index() {
        $settings = Setting::where('id', 1)->first();
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request) {
        $obj = Setting::where('id', 1)->first();
        $request->validate([
            'copyright_text' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|mimes:png,jpg,jpeg,gif'
            ]);

            unlink(public_path('uploads/'.$obj->logo));
            $ext = $request->file('logo')->extension();
            $final_name = 'logo'.'.'.$ext;
            $request->file('logo')->move(public_path('uploads/'),$final_name);
            $obj->logo = $final_name;
        }

        if($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'required|mimes:png,jpg,jpeg,gif'
            ]);

            unlink(public_path('uploads/'.$obj->favicon));
            $ext = $request->file('favicon')->extension();
            $final_name = 'favicon'.'.'.$ext;
            $request->file('favicon')->move(public_path('uploads/'),$final_name);
            $obj->favicon = $final_name;
        }

        $obj->total_allowed_job = $request->total_allowed_job;
        $obj->total_allowed_featured_job = $request->total_allowed_featured_job;
        $obj->total_allowed_photo = $request->total_allowed_photo;
        $obj->total_allowed_video = $request->total_allowed_video;
        $obj->top_bar_phone = $request->top_bar_phone;
        $obj->top_bar_email = $request->top_bar_email;
        $obj->footer_phone = $request->footer_phone;
        $obj->footer_email = $request->footer_email;
        $obj->footer_address = $request->footer_address;
        $obj->facebook = $request->facebook;
        $obj->twitter = $request->twitter;
        $obj->linkedin = $request->linkedin;
        $obj->pinterest = $request->pinterest;
        $obj->instagram = $request->instagram;
        $obj->copyright_text = $request->copyright_text;
        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successful!');
    }
}
