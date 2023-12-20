@extends('front.layouts.app')

@section('seo_title', $other_page_data->company_listing_page_title)
@section('seo_meta_description', $other_page_data->company_listing_page_meta_description)

@section('main-content')
    <div class="page-top page-top-job-single page-top-company-single"
        style="background-image: url({{ asset('uploads/'.$global_banner_data->banner_company_detail) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 job job-single">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/' . $company_single->logo) }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>{{ $company_single->company_name }}</h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">{{ $company_single->rCompanyIndustry->name }}</div>
                                <div class="location">{{ $company_single->rCompanyLocation->name }}</div>
                                <div class="email">{{ $company_single->email }}</div>
                                <div class="phone">{{ $company_single->phone }}</div>
                            </div>
                            <div class="special">
                                <div class="type">{{ $company_single->r_job_count }} Open Positions</div>
                                <div class="social">
                                    <ul>
                                        <li>
                                            <a href="{{ $company_single->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $company_single->twitter }}"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $company_single->linkedin }}"><i
                                                    class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ $company_single->instagram }}"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job-result pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            About Company
                        </h2>
                        {!! $company_single->description !!}
                    </div>
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Opening Hours
                        </h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Monday</td>
                                        <td>{{ $company_single->oh_mon }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>{{ $company_single->oh_tue }}</td>
                                    </tr>
                                    <tr>
                                        <td>Wednesday</td>
                                        <td>{{ $company_single->oh_wed }}</td>
                                    </tr>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>{{ $company_single->oh_thu }}</td>
                                    </tr>
                                    <tr>
                                        <td>Friday</td>
                                        <td>{{ $company_single->oh_fri }}</td>
                                    </tr>
                                    <tr>
                                        <td>Saturday</td>
                                        <td>{{ $company_single->oh_sat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sunday</td>
                                        <td>{{ $company_single->oh_sun }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Photos
                        </h2>
                        <div class="photo-all">
                            <div class="row">
                                @if ($photos->count() == 0)
                                    <div class="text-danger">No Photos Found</div>
                                @else
                                    @foreach ($photos as $item)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="item">
                                                <a href="{{ asset('uploads/' . $item->photo) }}" class="magnific">
                                                    <img src="{{ asset('uploads/' . $item->photo) }}" alt="" />
                                                    <div class="icon">
                                                        <i class="fas fa-plus"></i>
                                                    </div>
                                                    <div class="bg"></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Videos
                        </h2>
                        <div class="video-all">
                            <div class="row">
                                @if ($videos->count() == 0)
                                    <div class="text-danger">No Videos Found</div>
                                @else
                                    @foreach ($videos as $item)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="item">
                                                <a class="video-button"
                                                    href="http://www.youtube.com/watch?v={{ $item->video_id }}">
                                                    <img src="http://img.youtube.com/vi/{{ $item->video_id }}/0.jpg"
                                                        alt="" />
                                                    <div class="icon">
                                                        <i class="far fa-play-circle"></i>
                                                    </div>
                                                    <div class="bg"></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Open Positions
                        </h2>
                        <div class="job related-job pt-0 pb-0">
                            <div class="container">
                                <div class="row">
                                    @if ($jobs->count() == 0)
                                        <div class="text-danger">No Result Found</div>
                                    @else
                                        @foreach ($jobs as $item)
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
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Company Overview
                        </h2>
                        <div class="summary">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b> Contact Person:</b></td>
                                        <td>{{ $company_single->person_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b> Industry</b></td>
                                        <td>{{ $company_single->rCompanyIndustry->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email:</b></td>
                                        <td>{{ $company_single->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone:</b></td>
                                        <td>{{ $company_single->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Address:</b></td>
                                        <td>
                                            {{ $company_single->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Location:</b></td>
                                        <td>{{ $company_single->rCompanyLocation->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Website:</b></td>
                                        <td>{{ $company_single->website }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Company Size:</b>
                                        </td>
                                        <td>{{ $company_single->rCompanySize->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Founded On:</b>
                                        </td>
                                        <td>{{ $company_single->founded_on }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if ($company_single->map_code != null)
                        <div class="right-item">
                            <h2>
                                <i class="fas fa-file-invoice"></i>
                                Location Map
                            </h2>
                            <div class="location-map">
                                {!! $company_single->map_code !!}
                            </div>
                        </div>
                    @endif
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Contact Company
                        </h2>
                        <div class="enquery-form">
                            <form action="{{ route('company_contact_send_email') }}" method="post">
                                @csrf
                                <input type="hidden" name="company_name" value="{{ $company_single->company_name }}">
                                <input type="hidden" name="company_email" value="{{ $company_single->email }}">
                                <div class="mb-3">
                                    <input type="text" name="visitor_name" class="form-control"
                                        placeholder="Full Name" />
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="visitor_email" class="form-control"
                                        placeholder="Email Address" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="visitor_phone" class="form-control"
                                        placeholder="Phone Number" />
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control h-150" name="visitor_message" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
