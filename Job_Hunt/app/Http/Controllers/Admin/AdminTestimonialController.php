<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    //
    public function index() {
        $testimonials_data = Testimonial::get();
        return view('admin.testimonial', compact('testimonials_data'));
    }

    public function create() {
        return view('admin.testimonial_create');
    }

    public function store(Request $request) {
        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg,gif',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required'
        ]);

        $obj = new Testimonial();
        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial_'.time().'.'.$ext;
        //Move the new photo
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->route('admin_testimonial_create')->with('success', 'Data is saved successfully');
    }

    public function edit($id) {
        $testimonial_single = Testimonial::where('id', $id)->first();
        return view('admin.testimonial_edit', compact('testimonial_single'));
    }

    public function update(Request $request, $id) {
        $testimonial_single = Testimonial::where('id', $id)->first();
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:png,jpg,jpeg,gif'
            ]);

            //Remove the old photo
            unlink(public_path('uploads/'.$testimonial_single->photo));
            //Get extension of the new photo
            $ext = $request->file('photo')->extension();
            $final_name = 'testimonial_'.time().'.'.$ext;

            //Move the new photo
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $testimonial_single->photo = $final_name;
        }

        $testimonial_single->name = $request->name;
        $testimonial_single->designation = $request->designation;
        $testimonial_single->comment = $request->comment;
        $testimonial_single->update();

        return redirect()->route('admin_testimonial')->with('success', 'Data is updated successfully');
    }

    public function delete($id) {
        $testimonial_single = Testimonial::where('id', $id)->first();
        unlink(public_path('uploads/'.$testimonial_single->photo));
        Testimonial::where('id', $id)->delete();
        return redirect()->route('admin_testimonial')->with('success', 'Data is deleted successfully');
    }
}
