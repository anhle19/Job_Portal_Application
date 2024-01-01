<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Advertisement;
use App\Models\Company;
use App\Models\CompanyIndustry;
use App\Models\CompanyLocation;
use App\Models\CompanyPhoto;
use App\Models\CompanySize;
use App\Models\CompanyVideo;
use App\Models\Job;
use App\Models\Order;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyListingController extends Controller
{

    /**
     * Hiển thị danh sách company
     * Lưu lại dữ liệu của form tìm kiếm
     * Phân trang cho danh sách company
     * Mỗi khi load qua tran mới sẽ lưu lại dữ liệu form tìm kiếm trên url
     */
    public function index(Request $request) {
        //Lấy danh sách company kèm với khóa ngoại, tổng số job của company
        $companies = Company::with('rCompanyLocation', 'rCompanyIndustry', 'rCompanySize')
        ->withCount('rJob')->orderBy('id', 'desc');

        $other_page_data = PageOtherItem::where('id', 1)->first();
        $company_locations = CompanyLocation::orderBy('name', 'asc')->get();
        $company_industries = CompanyIndustry::orderBy('name', 'asc')->get();
        $company_sizes = CompanySize::orderBy('id', 'asc')->get();
        $advertisement = Advertisement::where('id', 1)->first(); 

        $form_data = array(
            'company_name' => $request->company_name,
            'location' => $request->location,
            'industry' => $request->industry,
            'size' => $request->size,
            'founded_on' => $request->founded_on
        );

        if($request->company_name != null) {
            $companies = $companies->where('company_name', 'LIKE', '%'.$request->company_name.'%');
        }

        if($request->location != null) {
            $companies = $companies->where('company_location_id', $request->location);
        }

        if($request->industry != null) {
            $companies = $companies->where('company_industry_id', $request->industry);
        }

        if($request->size != null) {
            $companies = $companies->where('company_size_id', $request->size);
        }

        if($request->founded_on != null) {
            $companies = $companies->where('founded_on', $request->founded_on);
        }

        $companies = $companies->paginate(9);

        return view('front.company_listing', compact('companies','company_locations', 'company_industries', 'company_sizes', 'form_data', 'advertisement', 'other_page_data'));
    }

    public function detail($id) {
        // //Kiểm tra ngày hết hạn nếu có package
        // $order_data = Order::where('company_id', $id)->where('currently_active', 1)->first();
        // if(date('Y-m-d') > $order_data->expire_date) {
        //     return redirect()->route('home');
        // }

        $company_single = Company::with('rCompanyLocation', 'rCompanyIndustry', 'rCompanySize')
        ->withCount('rJob')->where('id', $id)->first();
        $jobs = Job::with('rCompany', 'rJobCategory', 'rJobLocation', 'rJobType', 
        'rJobExperience', 'rJobGender', 'rJobSalaryRange')->where('company_id', $company_single->id)->orderBy('id', 'desc')->get();
        $photos = CompanyPhoto::where('company_id', $company_single->id)->orderBy('id', 'desc')->get();
        $videos = CompanyVideo::where('company_id', $company_single->id)->orderBy('id', 'desc')->get();
        $other_page_data = PageOtherItem::where('id', 1)->first();

        return view('front.company', compact('company_single', 'jobs', 'photos', 'videos', 'other_page_data'));
    }

    public function send_email(Request $request) {
        $request->validate([
            'visitor_name' => 'required',
            'visitor_email' => 'required|email',
            'visitor_phone' => 'required',
            'visitor_message' => 'required'
        ]);

        $subject = 'Contact for company: '.$request->company_name;
        $message = 'Visitor Information: <br>';
        $message .= 'Name: '.$request->visitor_name.'<br>';
        $message .= 'Email: '.$request->visitor_email.'<br>';
        $message .= 'Phone: '.$request->visitor_phone.'<br>';
        $message .= 'Message: '.$request->visitor_message;

        $data = array(
            'subject' => $subject,
            'message' => $message,
        );

        Mail::to($request->company_email)->send(new Websitemail($data));

        return redirect()->back()->with('success', 'Email is sent successfully!');
    }
}
