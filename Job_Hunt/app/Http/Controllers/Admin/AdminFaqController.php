<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Validation\Rule;

class AdminFaqController extends Controller
{
    public function index() {
        $faqs_data = Faq::get();
        return view('admin.faq', compact('faqs_data'));
    }

    public function create() {
        return view('admin.faq_create');
    }

    public function store(Request $request) {
        $request->validate([
            'question' => 'required|unique:faqs',
            'answer' => 'required'
        ]);

        $obj = new Faq();
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->save();

        return redirect()->route('admin_faq_create')->with('success', 'Data is saved successfully');
    }

    public function edit($id) {
        $faq_single = Faq::where('id', $id)->first();
        return view('admin.faq_edit', compact('faq_single'));
    }

    public function update(Request $request, $id) {
        $faq_single = Faq::where('id', $id)->first();
        $request->validate([
            'question' => ['required',Rule::unique('faqs')->ignore($id)],
            'answer' => 'required'
        ]);

        $faq_single->question = $request->question;
        $faq_single->answer = $request->answer;
        $faq_single->update();

        return redirect()->route('admin_faq')->with('success', 'Data is updated successfully');
    }

    public function delete($id) {
        Faq::where('id', $id)->delete();
        return redirect()->route('admin_faq')->with('success', 'Data is deleted successfully');
    }
}
