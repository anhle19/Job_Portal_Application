<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Candidate;
use App\Models\CandidateApplication;
use App\Models\CandidateAward;
use App\Models\CandidateBookmark;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateResume;
use App\Models\CandidateSkill;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CandidateController extends Controller
{
    public function dashboard() {
        $total_applied_job = CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 'Applied')->count();
        $total_approved_job = CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 'Approved')->count();
        $total_rejected_job = CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 'Rejected')->count();
        $applications = CandidateApplication::with('rJob')->where('candidate_id', Auth::guard('candidate')->user()->id)->orderBy('id', 'desc')->take(3)->get();
        return view('candidate.dashboard', compact('total_applied_job', 'total_approved_job', 'total_rejected_job', 'applications'));
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
        $obj->country = $request->country;
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
        return redirect()->back()->with('success', 'Data is deleted successful!');
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
        return redirect()->back()->with('success', 'Data is deleted successful!');
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
        return redirect()->back()->with('success', 'Data is deleted successful!');
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
        return redirect()->back()->with('success', 'Data is deleted successful!');
    }

    public function resume() {
        $resumes = CandidateResume::where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.resume', compact('resumes'));
    }

    public function resume_create() {
        return view('candidate.resume_create');
    }

    public function resume_store(Request $request) {

        $request->validate([
            'name' => ' required',
            'file' => ' required|mimes:pdf,doc,docx',
        ]);

        $obj = new CandidateResume();
        $ext = $request->file('file')->extension();
        $final_name = 'resume_'.time().'.'.$ext;
        $request->file('file')->move(public_path('uploads/'), $final_name);
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->file = $final_name;
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success', 'Data is saved successful!');
    }

    public function resume_edit($id) {
        $resume_single = CandidateResume::where('id', $id)->first();
        return view('candidate.resume_edit', compact('resume_single'));
    }

    public function resume_update($id, Request $request) {
        $resume_single = CandidateResume::where('id', $id)->first();

        $request->validate([
            'name' => ' required',
        ]);

        if($request->hasFile('file')) {
            $request->validate([
                'file' => ' required|mimes:pdf,doc,docx'
            ]);

            unlink(public_path('uploads/'.$resume_single->file));
            
            $ext = $request->file('file')->extension();
            $final_name = 'resume_'.time().'.'.$ext;
            $request->file('file')->move(public_path('uploads/'), $final_name);
            $resume_single->file = $final_name;
        }

        $resume_single->name = $request->name;
        $resume_single->update();
        
        return redirect()->route('candidate_resume')->with('success', 'Data is updated successful!');
    }

    public function resume_delete($id) {
        CandidateResume::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data is deleted successful!');
    }

    public function bookmark_add($id) {
        //Kiểm tra bookmark trùng nhau
        $existing_bookmark = CandidateBookmark::where('candidate_id', Auth::guard('candidate')->user()->id)
        ->where('job_id', $id)->count();

        if($existing_bookmark > 0) {
            return redirect()->back()->with('error', 'Job is already bookmarked!');
        }

        $obj = new CandidateBookmark();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->job_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'Job is bookmarked successful!');
    }

    public function bookmark_view() {
        $bookmarks = CandidateBookmark::where('candidate_id', Auth::guard('candidate')->user()->id)->orderBy('id', 'desc')->get();

        return view('candidate.bookmark',compact('bookmarks'));
    }

    public function bookmark_delete($id) {
        CandidateBookmark::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Bookmarked job is deleted successful!');
    }

    public function apply($id) {
        $existing_application = CandidateApplication::where('candidate_id', Auth::guard('candidate')->user()->id)
        ->where('job_id', $id)->count();

        if($existing_application > 0) {
            return redirect()->back()->with('error', 'Job is already applied!');
        }
        $job_single = Job::where('id', $id)->first();

        return view('candidate.apply', compact('job_single'));
    }

    public function apply_submit(Request $request,$id) {

        $request->validate([
            'cover_letter' => 'required'
        ]);

        //Lưu thông tin application vào database
        $obj = new CandidateApplication();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->job_id = $id;
        $obj->cover_letter = $request->cover_letter;
        $obj->status = 'Applied';
        $obj->save();

        //Lấy email của công ty
        $job_infor = Job::with('rCompany')->where('id', $id)->first();
        $company_email = $job_infor->rCompany->email;

        //Gửi email thông báo cho công ty
        $applicants_list_url = route('company_applicants', $id);
        $subject = 'A person applied to a job';    
        $message = 'Please check the application: <br>';
        $message .= '<a href="'.$applicants_list_url.'">Click here to see applicants list for this job</a>';

        //Data của email
        $data = array(
            'subject' => $subject,
            'message' => $message,
        );

        Mail::to($company_email)->send(new Websitemail($data));

        return redirect()->route('job', $id)->with('success', 'Your application is sent successfully!');
    }

    /**
     * Xem danh sách những job đã applied, cover letter, trang job detail
     */
    public function applications() {
        $applied_jobs = CandidateApplication::with('rJob')->where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('candidate.applications', compact('applied_jobs'));
    }
}
