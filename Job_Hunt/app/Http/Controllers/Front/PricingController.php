<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PagePricingItem;

class PricingController extends Controller
{
    public function index() {
        $packages = Package::orderBy('package_price', 'asc')->take(3)->get();
        $pricing_page_data = PagePricingItem::where('id', 1)->first();
        return view('front.pricing', compact('packages', 'pricing_page_data'));
    }

    public function detail($slug) {
        $post_single = Package::where('slug', $slug)->first();
        return view('front.post', compact('post_single'));
    }
}
