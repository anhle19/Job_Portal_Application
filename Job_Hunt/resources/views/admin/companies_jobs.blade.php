@extends('admin.layouts.app')

@section('heading', 'Jobs of company: ' . $company_detail->company_name)

@section('button')
    <div>
        <a href="{{ route('admin_companies') }}" class="btn btn-primary">Back</a>
    </div>
@endsection

@section('main-content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Is Featured</th>
                                        <th>Job Detail</th>
                                        <th>Applicants</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($company_jobs as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->rJobCategory->name }}</td>
                                            <td>{{ $item->rJobLocation->name }}</td>
                                            <td>
                                                @if ($item->is_featured == 1)
                                                    <span class="badge bg-success">Featured</span>
                                                @else
                                                    <span class="badge bg-danger">Not Featured</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('job', $item->id) }}" target="_blank"
                                                    class="badge bg-primary text-white">Detail</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin_companies_applicants', $item->id) }}"
                                                    class="badge bg-primary text-white">Applicants</a>
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
    </div>
@endsection
