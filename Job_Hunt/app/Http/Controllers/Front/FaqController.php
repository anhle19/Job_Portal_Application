<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\PageFaqItem;

class FaqController extends Controller
{
    public function index() {
        $faqs_data = Faq::orderBy('created_at', 'desc')->paginate(6);
        $faq_page_data = PageFaqItem::where('id', 1)->first();
        return view('front.faq', compact('faqs_data', 'faq_page_data'));
    }
}
