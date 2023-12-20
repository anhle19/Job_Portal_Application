@extends('front.layouts.app')

@section('main-content')
    <div class="page-top"
        style="background-image: url('{{ asset('uploads/' . $global_banner_data->banner_company_panel) }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Applicants of jobs: {{ $job_single->title }}</h2>
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
                    @if ($applicants->count() == 0)
                        <div class="text-danger">No Data Found</div>
                    @else
                        <h4>Applications for this job</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Current Status</th>
                                        <th>Action</th>
                                        <th>Detail</th>
                                        <th>Cover Letter</th>
                                    </tr>
                                    @php $i=0; @endphp
                                    @foreach ($applicants as $item)
                                    @php $i++; @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->rCandidate->name }}</td>
                                            <td>{{ $item->rCandidate->email }}</td>
                                            <td>{{ $item->rCandidate->phone }}</td>
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
                                                <form action="{{ route('application_status_change') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="candidate_id"
                                                        value="{{ $item->candidate_id }}">
                                                    <input type="hidden" name="job_id" value="{{ $item->job_id }}">
                                                    <select name="status" class="form-control select2 w_100"
                                                        onchange="this.form.submit()">
                                                        <option value="">Select</option>
                                                        <option value="Applied">Apply</option>
                                                        <option value="Approved">Approve</option>
                                                        <option value="Rejected">Reject</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('company_applicants_detail', $item->candidate_id) }}"
                                                    target="_blank" class="btn btn-primary btn-sm">Detail</a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $i }}">Cover Letter</a>

                                                <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cover
                                                                    Letter
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
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
