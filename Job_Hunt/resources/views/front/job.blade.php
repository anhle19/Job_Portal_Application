@extends('front.layouts.app')

@section('main-content')
    <div class="page-top page-top-job-single" style="background-image: url({{ asset('uploads/banner.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 job job-single">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/'.$job_single->rCompany->logo) }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>{{ $job_single->title }}, {{ $job_single->rCompany->company_name }}</h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">{{ $job_single->rJobCategory->name }}</div>
                                <div class="location">{{ $job_single->rJobLocation->name }}</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">{{ $job_single->created_at->diffForHumans() }}</div>
                                <div class="budget">{{ $job_single->rJobSalaryRange->name }}</div>
                                @if (date('Y-m-d') > $job_single->deadline)
                                <div class="expired">Expired</div>
                                @endif
                            </div>
                            <div class="special d-flex justify-content-start">
                                @if ($job_single->is_featured == 1)
                                <div class="featured">Featured</div>
                                @endif
                                <div class="type">{{ $job_single->rJobType->name }}</div>
                                @if ($job_single->is_urgent == 1)
                                <div class="urgent">Urgent</div>
                                @endif
                            </div>
                            <div class="apply">
                                <a href="apply.html" class="btn btn-primary">Apply Now</a>
                                <a href="apply.html" class="btn btn-primary save-job">Bookmark</a>
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
                            Description
                        </h2>
                        {!! $job_single->description !!}
                    </div>
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Job Responsibilities
                        </h2>
                        {!! $job_single->responsibility !!}
                    </div>
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Skills and Abilities
                        </h2>
                        {!! $job_single->skill !!}
                    </div>

                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Educational Qualification
                        </h2>
                        {!! $job_single->education !!}
                    </div>

                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Benefits
                        </h2>
                        {!! $job_single->benefit !!}
                    </div>

                    <div class="left-item">
                        <div class="apply">
                            <a href="apply.html" class="btn btn-primary">Apply Now</a>
                        </div>
                    </div>

                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Related Jobs
                        </h2>
                        <div class="job related-job pt-0 pb-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="item d-flex justify-content-start">
                                            <div class="logo">
                                                <img src="uploads/logo1.png" alt="" />
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="job.html">Software Engineer,
                                                        Google</a>
                                                </h3>
                                                <div class="detail-1 d-flex justify-content-start">
                                                    <div class="category">
                                                        Web Development
                                                    </div>
                                                    <div class="location">
                                                        United States
                                                    </div>
                                                </div>
                                                <div class="detail-2 d-flex justify-content-start">
                                                    <div class="date">
                                                        3 days ago
                                                    </div>
                                                    <div class="budget">
                                                        $3000-$3500
                                                    </div>
                                                    <div class="expired">
                                                        Expired
                                                    </div>
                                                </div>
                                                <div class="special d-flex justify-content-start">
                                                    <div class="featured">
                                                        Featured
                                                    </div>
                                                    <div class="type">
                                                        Full Time
                                                    </div>
                                                    <div class="urgent">
                                                        Urgent
                                                    </div>
                                                </div>
                                                <div class="bookmark">
                                                    <a href=""><i class="fas fa-bookmark active"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="item d-flex justify-content-start">
                                            <div class="logo">
                                                <img src="uploads/logo2.png" alt="" />
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="job.html">Web Designer,
                                                        Amplify</a>
                                                </h3>
                                                <div class="detail-1 d-flex justify-content-start">
                                                    <div class="category">
                                                        Web Design
                                                    </div>
                                                    <div class="location">
                                                        Canada
                                                    </div>
                                                </div>
                                                <div class="detail-2 d-flex justify-content-start">
                                                    <div class="date">
                                                        1 day ago
                                                    </div>
                                                    <div class="budget">
                                                        $1000-$1500
                                                    </div>
                                                </div>
                                                <div class="special d-flex justify-content-start">
                                                    <div class="featured">
                                                        Featured
                                                    </div>
                                                    <div class="type">
                                                        Part Time
                                                    </div>
                                                </div>
                                                <div class="bookmark">
                                                    <a href=""><i class="fas fa-bookmark"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Job Summary
                        </h2>
                        <div class="summary">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <b>Published On:</b>
                                        </td>
                                        <td>{{ $job_single->created_at->format('d F, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Deadline:</b></td>
                                        <td>
                                            @php
                                                $dt = DateTime::createFromFormat('Y-m-d', $job_single->deadline);
                                            @endphp
                                            {{ $dt->format('d F, Y') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Vacancy:</b></td>
                                        <td>{{ $job_single->vacancy }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Category:</b></td>
                                        <td>{{ $job_single->rJobCategory->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Location:</b></td>
                                        <td>{{ $job_single->rJobLocation->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Salary Range:</b>
                                        </td>
                                        <td>{{ $job_single->rJobSalaryRange->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Experience:</b>
                                        </td>
                                        <td>{{ $job_single->rJobExperience->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Type:</b></td>
                                        <td>{{ $job_single->rJobType->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Gender:</b></td>
                                        <td>{{ $job_single->rJobGender->name }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Enquery Form
                        </h2>
                        <div class="enquery-form">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Full Name" />
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Email Address" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Phone Number" />
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control h-150" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Location Map
                        </h2>
                        @if ($job_single->map_code != null)
                        <div class="location-map">
                            {!! $job_single->map_code !!}
                        </div> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
