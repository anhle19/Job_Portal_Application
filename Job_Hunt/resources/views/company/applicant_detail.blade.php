@extends('front.layouts.app')

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/' . 'banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Candidate Resume</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            @include('company.sidebar')
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <h4 class="resume">Basic Profile</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th class="w-200">Photo:</th>
                                <td>
                                    <img src="{{ asset('uploads/'.$candidate_single->photo) }}" alt="" class="w-100" />
                                </td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $candidate_single->name }}</td>
                            </tr>
                            <tr>
                                <th>Designation:</th>
                                <td>{{ $candidate_single->designation }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $candidate_single->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $candidate_single->phone }}</td>
                            </tr>
                            <tr>
                                <th>Country:</th>
                                <td>{{ $candidate_single->country }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ $candidate_single->address }}</td>
                            </tr>
                            <tr>
                                <th>State:</th>
                                <td>{{ $candidate_single->state }}</td>
                            </tr>
                            <tr>
                                <th>City:</th>
                                <td>{{ $candidate_single->city }}</td>
                            </tr>
                            <tr>
                                <th>Zip Code:</th>
                                <td>{{ $candidate_single->zip_code }}</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>{{ $candidate_single->gender }}</td>
                            </tr>
                            <tr>
                                <th>Marital Status:</th>
                                <td>{{ $candidate_single->marital_status }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth:</th>
                                <td>{{ $candidate_single->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th>Website:</th>
                                <td>{{ $candidate_single->website }}</td>
                            </tr>
                            <tr>
                                <th>Biography:</th>
                                <td>
                                    {!! $candidate_single->biography !!}
                                </td>
                            </tr>
                        </table>
                    </div>

                    @if ($educations->count() > 0)
                    <h4 class="resume mt-5">Education</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Education Level</th>
                                    <th>Institute</th>
                                    <th>Degree</th>
                                    <th>Passing Year</th>
                                </tr>
                                @foreach ($educations as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{{ $item->institute }}</td>
                                    <td>{{ $item->degree }}</td>
                                    <td>{{ $item->passing_year }}</td>
                                </tr> 
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($skills->count() > 0)                   
                    <h4 class="resume mt-5">Skills</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Skill Name</th>
                                    <th>Percentage</th>
                                </tr>
                                @foreach ($skills as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->percentage }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($experiences->count() > 0)                                          
                    <h4 class="resume mt-5">Experience</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Company</th>
                                    <th>Designation</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                                @foreach ($experiences as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->company }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->start_date}}</td>
                                    <td>{{ $item->end_date }}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($awards->count() > 0)
                    <h4 class="resume mt-5">Awards</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="w-100">Date</th>
                                </tr>
                                @foreach ($awards as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->date}}</td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if ($resumes->count() > 0)                                          
                    <h4 class="resume mt-5">Resume</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>File</th>
                                </tr>
                                @foreach ($resumes as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><a href="{{ asset('uploads/'.$item->file) }}" target="_blank">{{ $item->file }}</a></td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
