<?php

use Illuminate\Support\Facades\Route;

//Front
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\SignupController;
use App\Http\Controllers\Front\ForgetPasswordController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\JobCategoryController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\PricingController;

use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Candidate\CandidateController;

//Admin
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminWhyChooseController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPackageController;

use App\Http\Controllers\Admin\AdminJobCategoryPageController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminFaqPageController;
use App\Http\Controllers\Admin\AdminContactPageController;
use App\Http\Controllers\Admin\AdminBlogPageController;
use App\Http\Controllers\Admin\AdminTermPageController;
use App\Http\Controllers\Admin\AdminOtherPageController;
use App\Http\Controllers\Admin\AdminPricingPageController;
use App\Http\Controllers\Admin\AdminPrivacyPageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/terms-of-use', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::get('/post/{slug}', [PostController::class, 'detail'])->name('post');
Route::get('/job_categories', [JobCategoryController::class, 'categories'])->name('job_categories');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact_submit');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/create-account', [SignupController::class, 'index'])->name('signup');


/* Company */
Route::post('/company_login_submit', [LoginController::class, 'company_login_submit'])->name('company_login_submit');
Route::post('/company_signup_submit', [SignupController::class, 'company_signup_submit'])->name('company_signup_submit');
Route::get('/company_signup_verify/{token}/{email}', [
    SignupController::class,
    'company_signup_verify'
])->name('company_signup_verify');
Route::get('/forget-password/company', [
    ForgetPasswordController::class,
    'company_forget_password'
])->name('company_forget_password');
Route::post('/forget-password/company/submit', [
    ForgetPasswordController::class,
    'company_forget_password_submit'
])->name('company_forget_password_submit');
Route::get('reset-password/company/{token}/{email}', [
    ForgetPasswordController::class,
    'reset_password_company'
])->name('reset_password_company');
Route::post('reset-password/company/submit', [
    ForgetPasswordController::class,
    'reset_password_company_submit'
])->name('reset_password_company_submit');

Route::middleware('company:company')->group(function () {
    Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company_dashboard');
    Route::get('/company/orders', [CompanyController::class, 'orders'])->name('company_orders');
    Route::get('/company/make-payment', [CompanyController::class, 'make_payment'])->name('company_make_payment');
    Route::get('/company/logout', [CompanyController::class, 'logout'])->name('company_logout');
    //Paypal
    Route::post('/company/paypal/payment', [CompanyController::class, 'paypal'])->name('company_paypal');
    Route::get('/company/paypal/success', [CompanyController::class, 'paypal_success'])->name('company_paypal_success');
    Route::get('/company/paypal/cancel', [CompanyController::class, 'paypal_cancel'])->name('company_paypal_cancel');

    //Stripe
    Route::post('/company/stripe/payment', [CompanyController::class, 'stripe'])->name('company_stripe');
    Route::get('/company/stripe/success', [CompanyController::class, 'stripe_success'])->name('company_stripe_success');
    Route::get('/company/stripe/cancel', [CompanyController::class, 'stripe_cancel'])->name('company_stripe_cancel');
});

/* Candidate */
Route::post('/candidate_signup_submit', [SignupController::class, 'candidate_signup_submit'])->name('candidate_signup_submit');
Route::get('/candidate_signup_verify/{token}/{email}', [
    SignupController::class,
    'candidate_signup_verify'
])->name('candidate_signup_verify');
Route::post('/candidate_login_submit', [LoginController::class, 'candidate_login_submit'])->name('candidate_login_submit');
Route::get('/forget-password/candidate', [
    ForgetPasswordController::class,
    'candidate_forget_password'
])->name('candidate_forget_password');
Route::post('/forget-password/candidate/submit', [
    ForgetPasswordController::class,
    'candidate_forget_password_submit'
])->name('candidate_forget_password_submit');
Route::get('reset-password/candidate/{token}/{email}', [
    ForgetPasswordController::class,
    'reset_password_candidate'
])->name('reset_password_candidate');
Route::post('reset-password/candidate/submit', [
    ForgetPasswordController::class,
    'reset_password_candidate_submit'
])->name('reset_password_candidate_submit');

Route::middleware('candidate:candidate')->group(function () {
    Route::get('/candidate/dashboard', [CandidateController::class, 'dashboard'])->name('candidate_dashboard');
    Route::get('/candidate/logout', [CandidateController::class, 'logout'])->name('candidate_logout');
});

/* Admin */

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');

/* Root route */
Route::middleware(['admin:admin'])->group(function () {
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_edit_profile');
    Route::post('/admin/profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

    Route::get('/admin/home-page', [AdminHomePageController::class, 'index'])->name('admin_home_page');
    Route::post('/admin/home-page/update', [AdminHomePageController::class, 'update'])->name('admin_home_page_update');

    Route::get('/admin/faq-page', [AdminFaqPageController::class, 'index'])->name('admin_faq_page');
    Route::post('/admin/faq-page/update', [AdminFaqPageController::class, 'update'])->name('admin_faq_page_update');

    Route::get('/admin/blog-page', [AdminBlogPageController::class, 'index'])->name('admin_blog_page');
    Route::post('/admin/blog-page/update', [AdminBlogPageController::class, 'update'])->name('admin_blog_page_update');

    Route::get('/admin/term-page', [AdminTermPageController::class, 'index'])->name('admin_term_page');
    Route::post('/admin/term-page/update', [AdminTermPageController::class, 'update'])->name('admin_term_page_update');

    Route::get('/admin/privacy-page', [AdminPrivacyPageController::class, 'index'])->name('admin_privacy_page');
    Route::post('/admin/privacy-page/update', [AdminPrivacyPageController::class, 'update'])->name('admin_privacy_page_update');

    Route::get('/admin/contact-page', [AdminContactPageController::class, 'index'])->name('admin_contact_page');
    Route::post('/admin/contact-page/update', [AdminContactPageController::class, 'update'])->name('admin_contact_page_update');

    Route::get('/admin/job-categories-page', [AdminJobCategoryPageController::class, 'index'])->name('admin_job_categories_page');
    Route::post('/admin/job-categories-page/update', [AdminJobCategoryPageController::class, 'update'])->name('admin_job_categories_page_update');

    Route::get('/admin/pricing-page', [AdminPricingPageController::class, 'index'])->name('admin_pricing_page');
    Route::post('/admin/pricing-page/update', [AdminPricingPageController::class, 'update'])->name('admin_pricing_page_update');

    Route::get('/admin/other-page', [AdminOtherPageController::class, 'index'])->name('admin_other_page');
    Route::post('/admin/other-page/update', [AdminOtherPageController::class, 'update'])->name('admin_other_page_update');

    Route::get('/admin/job-category/view', [AdminJobCategoryController::class, 'index'])->name('admin_job_category');
    Route::get('/admin/job-category/create', [AdminJobCategoryController::class, 'create'])->name('admin_job_category_create');
    Route::post('/admin/job-category/store', [AdminJobCategoryController::class, 'store'])->name('admin_job_category_store');
    Route::get('/admin/job-category/edit/{id}', [AdminJobCategoryController::class, 'edit'])->name('admin_job_category_edit');
    Route::post('/admin/job-category/update/{id}', [AdminJobCategoryController::class, 'update'])->name('admin_job_category_update');
    Route::get('/admin/job-category/delete/{id}', [AdminJobCategoryController::class, 'delete'])->name('admin_job_category_delete');

    Route::get('/admin/why-choose/view', [AdminWhyChooseController::class, 'index'])->name('admin_why_choose');
    Route::get('/admin/why-choose/create', [AdminWhyChooseController::class, 'create'])->name('admin_why_choose_create');
    Route::post('/admin/why-choose/store', [AdminWhyChooseController::class, 'store'])->name('admin_why_choose_store');
    Route::get('/admin/why-choose/edit/{id}', [AdminWhyChooseController::class, 'edit'])->name('admin_why_choose_edit');
    Route::post('/admin/why-choose/update/{id}', [AdminWhyChooseController::class, 'update'])->name('admin_why_choose_update');
    Route::get('/admin/why-choose/delete/{id}', [AdminWhyChooseController::class, 'delete'])->name('admin_why_choose_delete');

    Route::get('/admin/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial');
    Route::get('/admin/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('/admin/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
    Route::get('/admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
    Route::get('/admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');

    Route::get('/admin/post/view', [AdminPostController::class, 'index'])->name('admin_post');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
    Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
    Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');

    Route::get('/admin/faq/view', [AdminFaqController::class, 'index'])->name('admin_faq');
    Route::get('/admin/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('/admin/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
    Route::get('/admin/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('/admin/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
    Route::get('/admin/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');

    Route::get('/admin/package/view', [AdminPackageController::class, 'index'])->name('admin_package');
    Route::get('/admin/package/create', [AdminPackageController::class, 'create'])->name('admin_package_create');
    Route::post('/admin/package/store', [AdminPackageController::class, 'store'])->name('admin_package_store');
    Route::get('/admin/package/edit/{id}', [AdminPackageController::class, 'edit'])->name('admin_package_edit');
    Route::post('/admin/package/update/{id}', [AdminPackageController::class, 'update'])->name('admin_package_update');
    Route::get('/admin/package/delete/{id}', [AdminPackageController::class, 'delete'])->name('admin_package_delete');
});
