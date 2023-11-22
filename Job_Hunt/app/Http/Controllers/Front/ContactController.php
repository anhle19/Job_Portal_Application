<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageContactItem;
use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        $contact_page_data = PageContactItem::where('id', 1)->first();
        return view('front.contact', compact('contact_page_data'));
    }

    public function submit(Request $request) {
        $admin_data = Admin::where('id', 1)->first();
        $request->validate([
            'person_name' => 'required',
            'person_email' => 'required',
            'person_message' => 'required'
        ]);

        $subject = 'Contact Form Contact';
        $message = 'Visitor Information: <br>';
        $message .= 'Name: '.$request->person_name.'<br>';
        $message .= 'Email: '.$request->person_email.'<br>';
        $message .= 'Message: '.$request->person_message;

        $data = array(
            'subject' => $subject,
            'message' => $message,
        );

        Mail::to($admin_data->email)->send(new Websitemail($data));

        return redirect()->back()->with('success', 'Email is sent successfully! We will contact you soon');
    }
}
