<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminSubscriberController extends Controller
{
    public function all_subscribers() {
        $subscribers = Subscriber::where('status', 1)->get();
        return view('admin.subscriber',compact('subscribers'));
    }

    public function send_email() {
        return view('admin.subscriber_send_email');
    }

    public function send_email_submit(Request $request) {

        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        $subject = $request->subject;
        $message = $request->message;
        $data = array(
            'subject' => $subject,
            'message' => $message
        );

        $subscribers = Subscriber::where('status', 1)->get();
        foreach($subscribers as $item) {
            Mail::to($item->email)->send(new Websitemail($data));
        }

        return redirect()->back()->with('success', 'Email is sent to all subscribers');
    }

    public function delete($id) {
        Subscriber::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Subscriber is deleted successful!');
    }
} 
