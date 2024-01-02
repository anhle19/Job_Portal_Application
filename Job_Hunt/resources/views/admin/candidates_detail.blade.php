@extends('admin.layouts.app')

@section('heading', 'Candidate Detail')

@section('button')
    <div>
        <a href="{{ route('admin_candidates') }}" class="btn btn-primary"> Back</a>
    </div>
@endsection

@section('main-content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Basic Profile</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th class="w_200">Photo:</th>
                                    <td>
                                        <img src="{{ asset('uploads/' . $candidate_single->photo) }}" alt=""
                                            class="w_100" />
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w_200">Name:</th>
                                    <td>{{ $candidate_single->name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Designation:</th>
                                    <td>{{ $candidate_single->designation }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Email:</th>
                                    <td>{{ $candidate_single->email }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Phone:</th>
                                    <td>{{ $candidate_single->phone }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Country:</th>
                                    <td>{{ $candidate_single->country }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Address:</th>
                                    <td>{{ $candidate_single->address }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">State:</th>
                                    <td>{{ $candidate_single->state }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">City:</th>
                                    <td>{{ $candidate_single->city }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Zip Code:</th>
                                    <td>{{ $candidate_single->zip_code }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Gender:</th>
                                    <td>{{ $candidate_single->gender }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Marital Status:</th>
                                    <td>{{ $candidate_single->marital_status }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Date of Birth:</th>
                                    <td>{{ $candidate_single->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Website:</th>
                                    <td>{{ $candidate_single->website }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Biography:</th>
                                    <td>
                                        {!! $candidate_single->biography !!}
                                    </td>
                                </tr>
                            </table>
                        </div>

                        @if ($educations->count() > 0)
                            <h4 class="resume mt-5">Education</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
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
                                <table class="table table-bordered table-sm">
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
                                <table class="table table-bordered table-sm">
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
                                                <td>{{ $item->start_date }}</td>
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
                                <table class="table table-bordered table-sm">
                                    <tbody>
                                        <tr>
                                            <th>SL</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                        </tr>
                                        @foreach ($awards as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        @if ($resumes->count() > 0)
                            <h4 class="resume mt-5">Resume</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
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
                                                <td><a href="{{ asset('uploads/' . $item->file) }}"
                                                        target="_blank">{{ $item->file }}</a></td>
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
    </div>
@endsection
