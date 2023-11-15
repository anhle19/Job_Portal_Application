<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    //
    public function index() {
        return view('admin.profile');
    }

    /**
     * Submit profile information
     * Change information also photo and password
     */
    public function profile_submit(Request $request) {
        //Get admin data from Auth
        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        //Update password
        if (!empty($request->password)) {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $admin_data->password = Hash::make($request->password);
        }

        //Update photo
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:png,jpg,jpeg,gif'
            ]);

            //Remove the old photo
            unlink(public_path('uploads/'.$admin_data->photo));
            //Get extension of the new photo
            $ext = $request->file('photo')->extension();
            $final_name = 'admin'.'.'.$ext;

            //Move the new photo
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $admin_data->photo = $final_name;
        }

        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();

        return redirect()->back()->with('success', 'Profile information is saved successfully');
    }
}
