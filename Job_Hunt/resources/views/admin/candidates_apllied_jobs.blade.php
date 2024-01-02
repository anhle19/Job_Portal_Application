@extends('admin.layouts.app')

@section('heading', 'Candidate Applied Jobs')

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
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Company</th>
                                        <th>Current Status</th>
                                        <th>Detail</th>
                                        <th>Cover Letter</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php $i=0; @endphp
                                        @foreach ($applications as $item)
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
                                                <a href="{{ route('job', $item->job_id) }}" target="_blank"
                                                    class="badge bg-primary text-white">Detail</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
