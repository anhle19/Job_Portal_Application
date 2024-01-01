@extends('admin.layouts.app')

@section('heading', 'Companies')

{{-- @section('button')
    <div>
        <a href="{{ route('admin_company_industry_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
    </div>
@endsection --}}

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
                                        <th>Company Name</th>
                                        <th>Person Name</th>
                                        <th>Username</th>
                                        <th>Detail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->company_name }}</td>
                                            <td>{{ $item->person_name }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>
                                                <a href="{{ route('admin_companies_detail', $item->id) }}"
                                                    class="badge bg-primary text-white w-100 mb-2">Detail</a>
                                                <a href="{{ route('admin_companies_jobs', $item->id) }}"
                                                    class="badge bg-primary text-white w-100">Jobs</a>
                                            </td>
                                            <td class="pt_10 pb_10">
                                                @if ($item->status == 1)
                                                <a href="{{ route('admin_companies_lock', $item->id) }}"
                                                    class="btn btn-danger btn-sm"
                                                    onClick="return confirm('Are you sure?');">Lock</a>
                                                @else
                                                <a href="{{ route('admin_companies_unlock', $item->id) }}"
                                                    class="btn btn-primary btn-sm"
                                                    onClick="return confirm('Are you sure?');">Unlock</a>
                                                @endif
                                                
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
