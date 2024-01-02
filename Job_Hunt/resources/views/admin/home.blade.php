@extends('admin.layouts.app')

@section('heading', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Companies</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_companies }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Candidates</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_candidates }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Jobs</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_jobs }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-file"></i>
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
                                    <th>Category Name</th>
                                    <th>Total Job</th>
                                    <th>Total Applications</th>
                                    <th>Total Approved</th>
                                    <th>Total Rejected</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_categories as $item)
                                @php
                                    $total_applications = DB::table('candidate_applications')
                                    ->join('jobs','candidate_applications.job_id','jobs.id')->where('jobs.job_category_id',$item->id)->count();

                                    $total_approved = DB::table('candidate_applications')
                                    ->join('jobs','candidate_applications.job_id','jobs.id')->where('jobs.job_category_id',$item->id)
                                    ->where('candidate_applications.status', 'Approved')->count();

                                    $total_rejected = DB::table('candidate_applications')
                                    ->join('jobs','candidate_applications.job_id','jobs.id')->where('jobs.job_category_id',$item->id)
                                    ->where('candidate_applications.status', 'Rejected')->count(); 
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->r_job_count }}</td>
                                        <td>{{ $total_applications }}</td>
                                        <td>{{ $total_approved }}</td>
                                        <td>{{ $total_rejected }}</td>
                                        <td>
                                            <a href="{{ route('admin_home_detail',$item->id) }}"
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
