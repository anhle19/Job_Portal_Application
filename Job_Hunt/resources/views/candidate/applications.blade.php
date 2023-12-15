@extends('front.layouts.app')

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/' . 'banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Applied Jobs</h2>
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
                            @include('candidate.sidebar')
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    @if ($applied_jobs->count() == 0)
                    <div class="text-danger">No Data Found</div>
                    @else 
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Cover Letter</th>
                                    <th class="w-100">Detail</th>
                                </tr>
                                @php $i=0; @endphp
                                @foreach ($applied_jobs as $item)
                                @php $i++; @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->rJob->title }}</td>
                                        <td>{{ $item->rJob->rCompany->company_name }}</td>
                                        <td>
                                            @if ($item->status == 'Applied')
                                                @php
                                                    $color = 'primary';
                                                @endphp
                                            @elseif($item->status == 'Approved')
                                                @php
                                                    $color = 'success';
                                                @endphp
                                            @else
                                                @php
                                                    $color = 'danger';
                                                @endphp
                                            @endif
                                            <div class="badge bg-{{ $color }}">
                                                {{ $item->status }}
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $i }}">Cover Letter</a>

                                            <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cover Letter
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! nl2br($item->cover_letter) !!}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('job', $item->job_id) }}"
                                                class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                        </td>
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
