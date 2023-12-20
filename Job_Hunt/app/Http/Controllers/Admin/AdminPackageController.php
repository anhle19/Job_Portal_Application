<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Package;

class AdminPackageController extends Controller
{
    public function index() {
        $packages = Package::get();
        return view('admin.package', compact('packages'));
    }

    public function create() {
        return view('admin.package_create');
    }

    public function store(Request $request) {
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required|integer',
            'package_days' => 'required|integer',
            'package_display_time' => 'required',
            'total_allowed_jobs' => 'required|integer',
            'total_allowed_featured_jobs' => 'required|integer',
            'total_allowed_photos' => 'required|integer',
            'total_allowed_videos' => 'required|integer'
        ]);

        $obj = new Package();
        $obj->package_name = $request->package_name;
        $obj->package_price = $request->package_price;
        $obj->package_days = $request->package_days;
        $obj->package_display_time = $request->package_display_time;
        $obj->total_allowed_jobs = $request->total_allowed_jobs;
        $obj->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
        $obj->total_allowed_photos = $request->total_allowed_photos;
        $obj->total_allowed_videos = $request->total_allowed_videos;
        $obj->save();

        return redirect()->route('admin_package_create')->with('success', 'Data is saved successfully');
    }

    public function edit($id) {
        $package_single = Package::where('id', $id)->first();
        return view('admin.package_edit', compact('package_single'));
    }

    public function update(Request $request, $id) {
        $package_single = Package::where('id', $id)->first();
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required|integer',
            'package_days' => 'required|integer',
            'package_display_time' => 'required',
            'total_allowed_jobs' => 'required|integer',
            'total_allowed_featured_jobs' => 'required|integer',
            'total_allowed_photos' => 'required|integer',
            'total_allowed_videos' => 'required|integer'
        ]);

        $package_single->package_name = $request->package_name;
        $package_single->package_price = $request->package_price;
        $package_single->package_days = $request->package_days;
        $package_single->package_display_time = $request->package_display_time;
        $package_single->total_allowed_jobs = $request->total_allowed_jobs;
        $package_single->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
        $package_single->total_allowed_photos = $request->total_allowed_photos;
        $package_single->total_allowed_videos = $request->total_allowed_videos;
        $package_single->update();

        return redirect()->route('admin_package')->with('success', 'Data is updated successfully');
    }

    public function delete($id) {
        $check = Order::where('package_id', $id)->count();
        if($check > 0) {
            return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
        }
        Package::where('id', $id)->delete();
        return redirect()->route('admin_package')->with('success', 'Data is deleted successfully');
    }
}
