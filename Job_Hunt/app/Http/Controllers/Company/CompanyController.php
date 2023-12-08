<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyIndustry;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Validation\Rule;
use App\Models\CompanyPhoto;
use App\Models\CompanyVideo;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobLocation;
use App\Models\JobSalaryRange;
use App\Models\JobType;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function dashboard()
    {
        $total_opened_jobs = Job::where('company_id', Auth::guard('company')->user()->id)->count();
        $total_featured_jobs = Job::where('company_id', Auth::guard('company')->user()->id)->where('is_featured', 1)->count();
        $jobs = Job::where('company_id', Auth::guard('company')->user()->id)->orderBy('id','desc')->get();
        return view('company.dashboard', compact('jobs', 'total_opened_jobs', 'total_featured_jobs'));
    }

    public function edit_password()
    {
        return view('company.edit_password');
    }

    public function edit_password_update(Request $request)
    {
        $company_data = Company::where('id', Auth::guard('company')->user()->id)->first();
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);
        $company_data->password = Hash::make($request->password);
        $company_data->update();

        return redirect()->back()->with('success', 'Password is updated successful!');
    }

    public function photos()
    {
        $company_id = Auth::guard('company')->user()->id;
        //Check if company have order
        $order_data = Order::where('company_id', $company_id)->where('currently_active', 1)->first();
        if (!isset($order_data)) {
            return redirect()->back()->with('error', 'You must to buy a package first to access this page');
        }

        //Check if company have package
        $package_data = Package::where('id', $order_data->package_id)->first();
        if ($package_data->total_allowed_photos == 0) {
            return redirect()->back()->with('error', 'Your current package does not allow to access photo section');
        }

        $photos = CompanyPhoto::where('company_id', Auth::guard('company')->user()->id)->get();
        return view('company.photos', compact('photos'));
    }

    public function photos_submit(Request $request)
    {
        $company_id = Auth::guard('company')->user()->id;
        $order_data = Order::where('company_id', $company_id)->where('currently_active', 1)->first();
        $package_data = Package::where('id', $order_data->package_id)->first();
        $total_company_photos = CompanyPhoto::where('company_id', $company_id)->count();

        //Check the current package
        if ($total_company_photos == $package_data->total_allowed_photos) {
            return redirect()->back()->with('error', 'Maximum number of allowed photos are uploaded!');
        }

        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg,gif'
        ]);
        $obj = new CompanyPhoto();

        $ext = $request->file('photo')->extension();
        $final_name = 'company_photo_' . time() . '.' . $ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);


        $obj->company_id = $company_id;
        $obj->photo = $final_name;
        $obj->save();

        return redirect()->back()->with('success', 'Data is saved successful!');
    }

    public function photos_delete($id)
    {
        $photo_single = CompanyPhoto::where('id', $id)->first();
        unlink(public_path('uploads/' . $photo_single->photo));
        $photo_single->delete();
        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    //Video

    public function videos()
    {
        $company_id = Auth::guard('company')->user()->id;
        //Check if company have order
        $order_data = Order::where('company_id', $company_id)->where('currently_active', 1)->first();
        if (!isset($order_data)) {
            return redirect()->back()->with('error', 'You must to buy a package first to access this page');
        }

        //Check if company have package
        $package_data = Package::where('id', $order_data->package_id)->first();
        if ($package_data->total_allowed_videos == 0) {
            return redirect()->back()->with('error', 'Your current package does not allow to access photo section');
        }

        $videos = CompanyVideo::where('company_id', Auth::guard('company')->user()->id)->get();
        return view('company.videos', compact('videos'));
    }

    public function videos_submit(Request $request)
    {
        $company_id = Auth::guard('company')->user()->id;
        $order_data = Order::where('company_id', $company_id)->where('currently_active', 1)->first();
        $package_data = Package::where('id', $order_data->package_id)->first();
        $total_company_videos = CompanyVideo::where('company_id', $company_id)->count();

        $request->validate([
            'video_id' => 'required'
        ]);

        //Check the current package
        if ($total_company_videos == $package_data->total_allowed_videos) {
            return redirect()->back()->with('error', 'Maximum number of allowed videos are uploaded!');
        }

        $obj = new CompanyVideo();
        $obj->company_id = $company_id;
        $obj->video_id = $request->video_id;
        $obj->save();

        return redirect()->back()->with('success', 'Data is saved successful!');
    }

    public function videos_delete($id)
    {
        CompanyVideo::where('id', $id)->first()->delete();
        return redirect()->back()->with('success', 'Data is deleted successfully!');
    }

    public function edit_profile()
    {
        $company_data = Company::where('id', Auth::guard('company')->user()->id)->first();
        $company_locations = CompanyLocation::get();
        $company_sizes = CompanySize::get();
        $company_industries = CompanyIndustry::get();
        return view('company.edit_profile', compact('company_data', 'company_locations', 'company_sizes', 'company_industries'));
    }

    public function edit_profile_update(Request $request)
    {

        $obj = Company::where('id', Auth::guard('company')->user()->id)->first();
        $request->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'username' => ['required', Rule::unique('companies')->ignore(Auth::guard('company')->user()->id)],
            'email' => ['required', Rule::unique('companies')->ignore(Auth::guard('company')->user()->id)]
        ]);

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:png,jpg,jpeg,gif'
            ]);

            if (Auth::guard('company')->user()->logo != null) {
                unlink(public_path('uploads/' . $obj->logo));
            }

            $ext = $request->file('logo')->extension();
            $final_name = 'company_logo_' . time() . '.' . $ext;
            $request->file('logo')->move(public_path('uploads/'), $final_name);
            $obj->logo = $final_name;
        }

        $obj->company_name = $request->company_name;
        $obj->person_name = $request->person_name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->address = $request->address;
        $obj->company_location_id = $request->company_location_id;
        $obj->company_industry_id = $request->company_industry_id;
        $obj->website = $request->website;
        $obj->company_size_id = $request->company_size_id;
        $obj->description = $request->description;
        $obj->founded_on = $request->founded_on;
        $obj->oh_mon = $request->oh_mon;
        $obj->oh_tue = $request->oh_tue;
        $obj->oh_wed = $request->oh_wed;
        $obj->oh_thu = $request->oh_thu;
        $obj->oh_fri = $request->oh_fri;
        $obj->oh_sat = $request->oh_sat;
        $obj->oh_sun = $request->oh_sun;
        $obj->map_code = $request->map_code;
        $obj->facebook = $request->facebook;
        $obj->twitter = $request->twitter;
        $obj->linkedin = $request->linkedin;
        $obj->instagram = $request->instagram;

        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successful!');
    }

    public function orders()
    {
        $orders = Order::with('rPackage')->orderBy('order_no', 'desc')->where('company_id', Auth::guard('company')->user()->id)->get();
        return view('company.orders', compact('orders'));
    }

    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('login');
    }

    public function make_payment()
    {
        $current_plan = Order::with('rPackage')->where('company_id', Auth::guard('company')->user()->id)
            ->where('currently_active', 1)->first();
        $packages = Package::get();

        return view('company.make_payment', compact('current_plan', 'packages'));
    }

    public function paypal(Request $request)
    {
        $single_package_data = Package::where('id', $request->package_id)->first();

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company_paypal_success'),
                "cancel_url" => route('company_paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $single_package_data->package_price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    session()->put('package_id', $single_package_data->id);
                    session()->put('package_price', $single_package_data->package_price);
                    session()->put('package_days', $single_package_data->package_days);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $data['currently_active'] = 0;
            Order::where('company_id', Auth::guard('company')->user()->id)->update($data);

            $obj = new Order();
            $obj->company_id = Auth::guard('company')->user()->id;
            $obj->package_id = session()->get('package_id');
            $obj->order_no = time();
            $obj->paid_amount = session()->get('package_price');
            $obj->payment_method = 'Paypal';
            $obj->start_date = date('Y-m-d');
            $days = session()->get('package_days');
            $obj->expire_date = date('Y-m-d', strtotime("+$days days"));
            $obj->currently_active = 1;
            $obj->save();

            //Delete session
            session()->forget('package_id');
            session()->forget('package_price');
            session()->forget('package_days');

            return redirect()->route('company_make_payment')->with('success', 'Payment is successful!');
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment is canceled!');
    }

    public function stripe(Request $request)
    {
        $single_package_data = Package::where('id', $request->package_id)->first();

        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));
        $response = \Stripe\Checkout\Session::create(
            [
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $single_package_data->package_name
                            ],
                            'unit_amount' => $single_package_data->package_price * 100
                        ],
                        'quantity' => 1,
                    ],
                ],

                'mode' => 'payment',
                'success_url' => route('company_stripe_success'),
                'cancel_url' => route('company_stripe_cancel')

            ]
        );

        session()->put('package_id', $single_package_data->id);
        session()->put('package_price', $single_package_data->package_price);
        session()->put('package_days', $single_package_data->package_days);
        return redirect()->away($response['url']);
    }

    public function stripe_success()
    {
        $data['currently_active'] = 0;
        Order::where('company_id', Auth::guard('company')->user()->id)->update($data);
        $obj = new Order();
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->package_id = session()->get('package_id');
        $obj->order_no = time();
        $obj->paid_amount = session()->get('package_price');
        $obj->payment_method = 'Stripe';
        $obj->start_date = date('Y-m-d');
        $days = session()->get('package_days');
        $obj->expire_date = date('Y-m-d', strtotime("+$days days"));
        $obj->currently_active = 1;
        $obj->save();
        //Delete session
        session()->forget('package_id');
        session()->forget('package_price');
        session()->forget('package_days');

        return redirect()->route('company_make_payment')->with('success', 'Payment is successful!');
    }

    public function stripe_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment is canceled!');
    }

    public function jobs_create()
    {

        $company_id = Auth::guard('company')->user()->id;

        //Check if company have order
        $order_data = Order::where('company_id', $company_id)->where('currently_active', 1)->first();
        if (!isset($order_data)) {
            return redirect()->back()->with('error', 'You must to buy a package first to access this page');
        }

        //Check jobs in the package
        $package_data = Package::where('id', $order_data->package_id)->first();
        $total_company_jobs = Job::where('company_id', $company_id)->count();
        if ($total_company_jobs == $package_data->total_allowed_jobs) {
            return redirect()->back()->with('error', 'You already have posted the maximum number of allowed jobs');
        }

        $job_categories = JobCategory::orderBy('name', 'ASC')->get();
        $job_locations = JobLocation::orderBy('name', 'ASC')->get();
        $job_types = JobType::orderBy('name', 'ASC')->get();
        $job_experiences = JobExperience::orderBy('id', 'ASC')->get();
        $job_genders = JobGender::orderBy('id', 'ASC')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id', 'ASC')->get();
        return view(
            'company.job_create',
            compact('job_categories', 'job_locations', 'job_types', 'job_experiences', 'job_genders', 'job_salary_ranges')
        );
    }

    public function jobs_create_submit(Request $request)
    {
        $company_id = Auth::guard('company')->user()->id;
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
        ]);

        //Check featured jobs in the package
        $order_data = Order::where('company_id', $company_id)->where('currently_active', 1)->first();
        $package_data = Package::where('id', $order_data->package_id)->first();
        $total_featured_jobs = Job::where('company_id', $company_id)->where('is_featured', 1)->count();

        if ($total_featured_jobs == $package_data->total_allowed_featured_jobs) {
            if ($request->is_featured == 1) {
                return redirect()->back()->with('error', 'You already have posted the maximum number of featured jobs');
            }
        }

        $obj = new Job();
        $obj->company_id = $company_id;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->responsibility = $request->responsibility;
        $obj->skill = $request->skill;
        $obj->education = $request->education;
        $obj->benefit = $request->benefit;
        $obj->deadline = $request->deadline;
        $obj->vacancy = $request->vacancy;
        $obj->job_category_id = $request->job_category_id;
        $obj->job_location_id = $request->job_location_id;
        $obj->job_type_id = $request->job_type_id;
        $obj->job_experience_id = $request->job_experience_id;
        $obj->job_gender_id = $request->job_gender_id;
        $obj->job_salary_range_id = $request->job_salary_range_id;
        $obj->map_code = $request->map_code; 
        $obj->is_featured = $request->is_featured;
        $obj->is_urgent = $request->is_urgent;
        $obj->save();

        return redirect()->back()->with('success', 'Data is saved successful!');
    }

    public function jobs()
    {
        $jobs = Job::with('rJobCategory', 'rJobLocation')
            ->where('company_id', Auth::guard('company')->user()->id)
            ->orderBy('id', 'ASC')->get();
        return view('company.jobs', compact('jobs'));
    }

    public function jobs_edit($id)
    {
        $job_single = Job::where('id', $id)->first();
        $job_categories = JobCategory::orderBy('name', 'ASC')->get();
        $job_locations = JobLocation::orderBy('name', 'ASC')->get();
        $job_types = JobType::orderBy('name', 'ASC')->get();
        $job_experiences = JobExperience::orderBy('id', 'ASC')->get();
        $job_genders = JobGender::orderBy('id', 'ASC')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id', 'ASC')->get();
        return view(
            'company.job_edit',
            compact('job_single', 'job_categories', 'job_locations', 'job_types', 'job_experiences', 'job_genders', 'job_salary_ranges')
        );
    }

    public function jobs_edit_update(Request $request, $id)
    {
        $company_id = Auth::guard('company')->user()->id;
        $job_single = Job::where('id', $id)->first();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required',
            'vacancy' => 'required',
        ]);

        //Check featured jobs in the package
        $order_data = Order::where('company_id', $company_id)->where('currently_active', 1)->first();
        $package_data = Package::where('id', $order_data->package_id)->first();
        $total_featured_jobs = Job::where('company_id', $company_id)->where('is_featured', 1)->count();

        if ($total_featured_jobs == $package_data->total_allowed_featured_jobs) {
            if ($request->is_featured == 1) {
                return redirect()->back()->with('error', 'You already have posted the maximum number of featured jobs');
            }
        }

        $job_single->company_id = $company_id;
        $job_single->title = $request->title;
        $job_single->description = $request->description;
        $job_single->responsibility = $request->responsibility;
        $job_single->skill = $request->skill;
        $job_single->education = $request->education;
        $job_single->benefit = $request->benefit;
        $job_single->deadline = $request->deadline;
        $job_single->vacancy = $request->vacancy;
        $job_single->job_category_id = $request->job_category_id;
        $job_single->job_location_id = $request->job_location_id;
        $job_single->job_type_id = $request->job_type_id;
        $job_single->job_experience_id = $request->job_experience_id;
        $job_single->job_gender_id = $request->job_gender_id;
        $job_single->job_salary_range_id = $request->job_salary_range_id;
        $job_single->map_code = $request->map_code; 
        $job_single->is_featured = $request->is_featured;
        $job_single->is_urgent = $request->is_urgent;
        $job_single->update();

        return redirect()->back()->with('success', 'Data is updated successful!');
    }

    public function jobs_delete($id) {
        Job::where('id', $id)->first()->delete();
        return redirect()->route('company_jobs')->with('success', 'Data is deleted successful!');
    }
}
