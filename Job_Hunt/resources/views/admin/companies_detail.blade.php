@extends('admin.layouts.app')

@section('heading', 'Company Detail')

@section('button')
    <div>
        <a href="{{ route('admin_companies') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Back to previous</a>
    </div>
@endsection

@section('main-content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th class="w_200">Logo</th>
                                    <td>
                                        <img src="{{ asset('uploads/' . $company_detail->logo) }}" class="w_100">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w_200">Company Name</th>
                                    <td>{{ $company_detail->company_name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Person Name</th>
                                    <td>{{ $company_detail->person_name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Username</th>
                                    <td>{{ $company_detail->username }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Email</th>
                                    <td>{{ $company_detail->email }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Phone</th>
                                    <td>{{ $company_detail->phone }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Address</th>
                                    <td>{{ $company_detail->address }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Company Location</th>
                                    <td>{{ $company_detail->rCompanyLocation->name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Company Size</th>
                                    <td>{{ $company_detail->rCompanySize->name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Company Industry</th>
                                    <td>{{ $company_detail->rCompanyIndustry->name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Website</th>
                                    <td>{{ $company_detail->website }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Founded On</th>
                                    <td>{{ $company_detail->founded_on }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Description</th>
                                    <td>{!! $company_detail->description !!}</td>
                                </tr>
                                <tr class="w_200">
                                    <th>Opening Hour</th>
                                    <td>
                                        Monday: {{ $company_detail->oh_mon }} <br>
                                        Tuesday: {{ $company_detail->oh_tue }} <br>
                                        Wednesday: {{ $company_detail->oh_wed }} <br>
                                        Thursday: {{ $company_detail->oh_thu }} <br>
                                        Friday: {{ $company_detail->oh_fri }} <br>
                                        Saturday: {{ $company_detail->oh_sat }} <br>
                                        Sunday: {{ $company_detail->oh_sun }} <br>
                                    </td>
                                </tr>
                                <tr class="w_200">
                                    <th>Facebook</th>
                                    <td>{{ $company_detail->facebook }}</td>
                                </tr>
                                <tr class="w_200">
                                    <th>Twitter</th>
                                    <td>{{ $company_detail->twitter }}</td>
                                </tr>
                                <tr class="w_200">
                                    <th>Linkedin</th>
                                    <td>{{ $company_detail->linkedin }}</td>
                                </tr>
                                <tr class="w_200">
                                    <th>Instagram</th>
                                    <td>{{ $company_detail->instagram }}</td>
                                </tr>
                                <tr class="w_200">
                                    <th>Map code</th>
                                    <td>
                                        {!! $company_detail->map_code !!}
                                    </td>
                                </tr>
                                <tr class="w_200">
                                    <th>Photos</th>
                                    <td>
                                        @foreach ($photos as $item)
                                            <img src="{{ asset('uploads/' . $item->photo) }}" class="w_200">
                                        @endforeach
                                    </td>
                                </tr>
                                <tr class="w_200">
                                    <th>Videos</th>
                                    <td>
                                        @foreach ($videos as $item)
                                            <iframe class="w_300 h_150" width="875" height="492"
                                                src="https://www.youtube.com/embed/{{ $item->video_id }}"
                                                title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
