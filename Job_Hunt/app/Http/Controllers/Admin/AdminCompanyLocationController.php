<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\CompanyLocation;

class AdminCompanyLocationController extends Controller
{
    public function index() {
        $company_locations = CompanyLocation::get();
        return view('admin.company_location', compact('company_locations'));
    }

    public function create() {
        return view('admin.company_location_create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new CompanyLocation();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_company_location_create')->with('success', 'Data is saved successfully');
    }

    public function edit($id) {
        $company_location_single = CompanyLocation::where('id', $id)->first();
        return view('admin.company_location_edit', compact('company_location_single'));
    }

    public function update(Request $request, $id) {
        $company_location_single = CompanyLocation::where('id', $id)->first();
        $request->validate([
            'name' => 'required'
        ]);

        $company_location_single->name = $request->name;
        $company_location_single->update();

        return redirect()->route('admin_company_location')->with('success', 'Data is updated successfully');
    }

    public function delete($id) {
        $check = Company::where('company_location_id', $id)->count();
        if($check > 0) {
            return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
        }
        CompanyLocation::where('id', $id)->delete();
        return redirect()->route('admin_company_location')->with('success', 'Data is deleted successfully');
    }
}
