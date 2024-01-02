@extends('admin.layouts.app')

@section('heading', $category_name)

@section('button')
    <div>
        <a href="{{ route('admin_home') }}" class="btn btn-primary"> Back</a>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Applications</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_applications }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-check"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Approved</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_approved }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fa-regular fa-circle-xmark fa-2xl" style="color: #ffffff;"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Rejected</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_rejected }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Job Title</th>
                                    <th>Company Name</th>
                                    <th>Vacancy</th>
                                    <th>Total Applications</th>
                                    <th>Total Approved</th>
                                    <th>Total Rejected</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $item)
                                @php
                                    $total_job_applications = \App\Models\CandidateApplication::where('job_id',$item->id)->count();

                                    $total_job_approved = \App\Models\CandidateApplication::where('job_id',$item->id)->where('status','Approved')->count();

                                    $total_job_rejected = \App\Models\CandidateApplication::where('job_id',$item->id)->where('status','Rejected')->count();
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->rCompany->company_name }}</td>
                                        <td>{{ $item->vacancy }}</td>
                                        <td>{{ $total_job_applications }}</td>
                                        <td>{{ $total_job_approved }}</td>
                                        <td>{{ $total_job_rejected }}</td>
                                        <td>
                                            <a href="{{ route('job', $item->id) }}"
                                                class="badge bg-primary text-white w-100 mb-2">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

