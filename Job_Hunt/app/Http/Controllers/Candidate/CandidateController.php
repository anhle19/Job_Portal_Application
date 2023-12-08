<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateAward;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CandidateController extends Controller
{
    public function dashboard() {
        return view('candidate.dashboard');
    }

    public function logout() {
        Auth::guard('candidate')->logout();
        return redirect()->route('login');
    }

    public function edit_profile() {
        $candidate = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();
        return view('candidate.edit_profile', compact('candidate'));
    }

    public function edit_profile_update(Request $request) {

        $obj = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]);

            if ($obj->photo != null) {
                unlink(public_path('uploads/' . $obj->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = 'candidate_photo_' . time() . '.' . $ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->designation = $request->designation;
        $obj->biography = $request->biography;
        $obj->phone = $request->phone;
        $obj->coutry = $request->country;
        $obj->address = $request->address;
        $obj->state = $request->state;
        $obj->city = $request->city;
        $obj->zip_code = $request->zip_code;
        $obj->gender = $request->gender;
        $obj->marital_status = $request->marital_status;
        $obj->date_of_birth = $request->date_of_birth;
        $obj->website = $request->website;
        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successful!');
    }

    public function edit_password()
    {
        return view('candidate.edit_password');
    }

    public function edit_password_update(Request $request)
    {
        $candidate_data = Candidate::where('id', Auth::guard('candidate')->user()->id)->first();
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);
        $candidate_data->password = Hash::make($request->password);
        $candidate_data->update();

        return redirect()->back()->with('success', 'Password is updated successful!');
    }

    public function education() {
        $educations = CandidateEducation::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.education', compact('educations'));
    }

    public function education_create() {
        return view('candidate.education_create');
    }

    public function education_store(Request $request) {
        $request->validate([
            'level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required'
        ]);

        $obj = new CandidateEducation();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->level = $request->level;
        $obj->institute = $request->institute;
        $obj->degree = $request->degree;
        $obj->passing_year = $request->passing_year;
        $obj->save();

        return redirect()->back()->with('success', 'Data is saved successful!');
    }

    public function education_edit($id) {
        $education_single = CandidateEducation::where('id', $id)->first();
        return view('candidate.education_edit', compact('education_single'));
    }

    public function education_update(Request $request, $id) {
        $education_single = CandidateEducation::where('id', $id)->first();

        $request->validate([
            'level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required'
        ]);

        $education_single->level = $request->level;
        $education_single->institute = $request->institute;
        $education_single->degree = $request->degree;
        $education_single->passing_year = $request->passing_year;
        $education_single->update();

        return redirect()->route('candidate_education')->with('success', 'Data is updated successful!');
    }

    public function education_delete($id) {
        CandidateEducation::where('id', $id)->delete();
        return redirect()->route('candidate_education')->with('success', 'Data is deleted successful!');
    }

    //skill
    public function skill() {
        $skills = CandidateSkill::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.skill', compact('skills'));
    }

    public function skill_create() {
        return view('candidate.skill_create');
    }

    public function skill_store(Request $request) {
        $request->validate([
            'name' => 'required',
            'percentage' => 'required',
        ]);

        $obj = new CandidateSkill();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->save();

        return redirect()->back()->with('success', 'Data is saved successful!');
    }

    public function skill_edit($id) {
        $skill_single = CandidateSkill::where('id', $id)->first();
        return view('candidate.skill_edit', compact('skill_single'));
    }

    public function skill_update(Request $request, $id) {
        $skill_single = CandidateSkill::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'percentage' => 'required',
        ]);

        $skill_single->name = $request->name;
        $skill_single->percentage = $request->percentage;
        $skill_single->update();

        return redirect()->route('candidate_skill')->with('success', 'Data is updated successful!');
    }

    public function skill_delete($id) {
        CandidateSkill::where('id', $id)->delete();
        return redirect()->route('candidate_skill')->with('success', 'Data is deleted successful!');
    }

    //Experience
    public function experience() {
        $experiences = CandidateExperience::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.experience', compact('experiences'));
    }

    public function experience_create() {
        return view('candidate.experience_create');
    }

    public function experience_store(Request $request) {
        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $obj = new CandidateExperience();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->company = $request->company;
        $obj->designation = $request->designation;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->save();

        return redirect()->back()->with('success', 'Data is saved successful!');
    }

    public function experience_edit($id) {
        $experience_single = CandidateExperience::where('id', $id)->first();
        return view('candidate.experience_edit', compact('experience_single'));
    }

    public function experience_update(Request $request, $id) {
        $experience_single = CandidateExperience::where('id', $id)->first();

        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $experience_single->company = $request->company;
        $experience_single->designation = $request->designation;
        $experience_single->start_date = $request->start_date;
        $experience_single->end_date = $request->end_date;
        $experience_single->update();

        return redirect()->route('candidate_experience')->with('success', 'Data is updated successful!');
    }

    public function experience_delete($id) {
        CandidateExperience::where('id', $id)->delete();
        return redirect()->route('candidate_experience')->with('success', 'Data is deleted successful!');
    }
    
    //Award
    public function award() {
        $awards = CandidateAward::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.award', compact('awards'));
    }

    public function award_create() {
        return view('candidate.award_create');
    }

    public function award_store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $obj = new CandidateAward();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->date = $request->date;
        $obj->save();

        return redirect()->back()->with('success', 'Data is saved successful!');
    }

    public function award_edit($id) {
        $award_single = CandidateAward::where('id', $id)->first();
        return view('candidate.award_edit', compact('award_single'));
    }

    public function award_update(Request $request, $id) {
        $award_single = CandidateAward::where('id', $id)->first();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $award_single->title = $request->title;
        $award_single->description = $request->description;
        $award_single->date = $request->date;
        $award_single->update();

        return redirect()->route('candidate_award')->with('success', 'Data is updated successful!');
    }

    public function award_delete($id) {
        CandidateAward::where('id', $id)->delete();
        return redirect()->route('candidate_award')->with('success', 'Data is deleted successful!');
    }
}
