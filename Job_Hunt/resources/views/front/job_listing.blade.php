@extends('front.layouts.app')

@section('seo_title', $other_page_data->job_listing_page_title)
@section('seo_meta_description', $other_page_data->job_listing_page_meta_description)

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/' . $global_banner_data->banner_job_listing) }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2> {{ $other_page_data->job_listing_page_heading }} </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="job-result">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="job-filter">
                        <form action="{{ url('job-listing') }}" method="get">
                            <div class="widget">
                                <h2>Job Title</h2>
                                <input type="text" name="title" class="form-control" placeholder="Search Titles ..."
                                    value="{{ $form_data['title'] }}" />
                            </div>

                            <div class="widget">
                                <h2>Job Location</h2>
                                <select name="location" class="form-control select2">
                                    <option value="">Job Location</option>
                                    @foreach ($job_locations as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($form_data['location'] == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Job Category</h2>
                                <select name="category" class="form-control select2">
                                    <option value="">Job Category</option>
                                    @foreach ($job_categories as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($form_data['category'] == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Job Type</h2>
                                <select name="type" class="form-control select2">
                                    <option value="">Job Type</option>
                                    @foreach ($job_types as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($form_data['type'] == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Experience</h2>
                                <select name="experience" class="form-control select2">
                                    <option value="">Job Experience</option>
                                    @foreach ($job_experiences as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($form_data['experience'] == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Gender</h2>
                                <select name="job_gender" class="form-control select2">
                                    <option value="">Job Gender</option>
                                    @foreach ($job_genders as $item)
                                        <option
                                            value="{{ $item->id }} @if ($form_data['gender'] == $item->id) selected @endif">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Salary Range</h2>
                                <select name="job_salary_range" class="form-control select2">
                                    <option value="">Job Salary Range</option>
                                    @foreach ($job_salary_ranges as $item)
                                        <option
                                            value="{{ $item->id }} @if ($form_data['salary_range'] == $item->id) selected @endif">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-button">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Filter
                                </button>
                            </div>
                        </form>

                        @if ($advertisement->job_listing_ad_status == 'Show')
                        <div class="advertisement">
                            @if ($advertisement->job_listing_ad == null)
                            <a href=""><img src="{{ asset('uploads/ad_default.png') }}" alt="" /></a>
                            @else
                            <a href="{{ $advertisement->job_listing_ad_url }}" target="_blank"><img src="{{ asset('uploads/'.$advertisement->job_listing_ad) }}" alt="" /></a>
                            @endif
                        </div>
                        @endif
                        
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="job">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-result-header">
                                        <i class="fas fa-search"></i> Search
                                        Result for Job Listing
                                    </div>
                                </div>
                                @if ($jobs->count() == 0)
                                    <div class="text-danger">No Result Found</div>
                                @else
                                    @foreach ($jobs as $item)
                                    @php
                                    $company_id = $item->company_id;
                                    $order_data = \App\Models\Order::where('company_id',$company_id)->where('currently_active',1)->first();
                                    if (date('Y-m-d') > $order_data->expire_date) {
                                        continue;
                                    }
                                    @endphp
                                        <div class="col-md-12">
                                            <div class="item d-flex justify-content-start">
                                                <div class="logo">
                                                    <img src="{{ asset('uploads/' . $item->rCompany->logo) }}"
                                                        alt="" />
                                                </div>
                                                <div class="text">
                                                    <h3>
                                                        <a href="{{ route('job', $item->id) }}">{{ $item->title }},
                                                            {{ $item->rCompany->company_name }}</a>
                                                    </h3>
                                                    <div class="detail-1 d-flex justify-content-start">
                                                        <div class="category">
                                                            {{ $item->rJobCategory->name }}
                                                        </div>
                                                        <div class="location">
                                                            {{ $item->rJobLocation->name }}
                                                        </div>
                                                    </div>
                                                    <div class="detail-2 d-flex justify-content-start">
                                                        <div class="date">
                                                            {{ $item->created_at->diffForHumans() }}
                                                        </div>
                                                        <div class="budget">
                                                            {{ $item->rJobSalaryRange->name }}
                                                        </div>
                                                        @if (date('Y-m-d') > $item->deadline)
                                                            <div class="expired">
                                                                Expired
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="special d-flex justify-content-start">
                                                        @if ($item->is_featured == 1)
                                                            <div class="featured">
                                                                Featured
                                                            </div>
                                                        @endif
                                                        <div class="type">
                                                            {{ $item->rJobType->name }}
                                                        </div>
                                                        @if ($item->is_urgent == 1)
                                                            <div class="urgent">
                                                                Urgent
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @if (!Auth::guard('company')->check())
                                                        <div class="bookmark">
                                                            @if (Auth::guard('candidate')->check())
                                                                @php
                                                                    $count = \App\Models\CandidateBookmark::where('candidate_id', Auth::guard('candidate')->user()->id)
                                                                        ->where('job_id', $item->id)
                                                                        ->count();
                                                                @endphp
                                                                @if ($count > 0)
                                                                    @php
                                                                        $bookmark_status = 'active';
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $bookmark_status = '';
                                                                    @endphp
                                                                @endif
                                                            @else
                                                                @php
                                                                    $bookmark_status = '';
                                                                @endphp
                                                            @endif
                                                            <a href="{{ route('candidate_bookmark_add', $item->id) }}"><i
                                                                    class="fas fa-bookmark {{ $bookmark_status }}"></i></a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            {{-- Giữ lại url khi phân trang --}}
                                            {{ $jobs->appends($_GET)->links() }}
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
