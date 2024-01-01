<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateApplication;
use App\Models\CandidateAward;
use App\Models\CandidateBookmark;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateResume;
use App\Models\CandidateSkill;
use Illuminate\Http\Request;

class AdminCandidateController extends Controller
{
    public function index() {
        $candidates = Candidate::whereIn('status', [1,2])->get();

        return view('admin.candidates', compact('candidates'));
    }

    public function candidates_detail($id) {
        $candidate_single = Candidate::where('id', $id)->first();
        $educations = CandidateEducation::where('candidate_id', $id)->get();
        $skills = CandidateSkill::where('candidate_id', $id)->get();
        $experiences = CandidateExperience::where('candidate_id', $id)->get();
        $awards = CandidateAward::where('candidate_id', $id)->get();
        $resumes = CandidateResume::where('candidate_id', $id)->get();

        return view('admin.candidates_detail', compact('candidate_single', 'educations', 'skills', 'experiences', 'awards', 'resumes'));
    }

    public function candidates_applied_jobs($id) {
        $applications = CandidateApplication::with('rJob','rCandidate')->where('candidate_id', $id)->get();
        return view('admin.candidates_apllied_jobs', compact('applications'));
    }

    // public function delete($id) {
    //     CandidateApplication::where('candidate_id', $id)->delete();
    //     CandidateBookmark::where('candidate_id', $id)->delete();
    //     CandidateEducation::where('candidate_id', $id)->delete();
    //     CandidateExperience::where('candidate_id', $id)->delete();
    //     CandidateAward::where('candidate_id', $id)->delete();
    //     CandidateSkill::where('candidate_id', $id)->delete();
        
    //     $resume_data = CandidateResume::where('candidate_id', $id)->get();
    //     if($resume_data != null) {
    //         foreach($resume_data as $item) {
    //             unlink(public_path('uploads/'.$item->file));
    //         }
    //         CandidateResume::where('candidate_id', $id)->delete();
    //     }
    //     $candidate_data = Candidate::where('id', $id)->first();
    //     if($candidate_data->photo != null) {
    //         unlink(public_path('uploads/'.$candidate_data->photo));
    //     }
    //     Candidate::where('id', $id)->delete();

    //     return redirect()->back()->with('success', 'Data is deleted successful!');
    // }

    public function lock($id) {
        $candidate_data = Candidate::where('id', $id)->first();
        $candidate_data->status = 2;
        $candidate_data->update();
        return redirect()->back()->with('success', 'Account is locked');
    }

    public function unlock($id) {
        $candidate_data = Candidate::where('id', $id)->first();
        $candidate_data->status = 1;
        $candidate_data->update();
        return redirect()->back()->with('success', 'Account is unlocked');
    }
}
