@extends('front.layouts.app')

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/' . 'banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Resume List</h2>
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
                    <a href="{{ route('candidate_resume_create') }}" class="btn btn-primary btn-sm mb-2"><i
                            class="fas fa-plus"></i>
                        Add Item</a>
                    @if ($resumes == null)
                        <div class="row">
                            <div class="col-md-12 text-danger">
                                No Data Found
                            </div>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($resumes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ $item->file }}" target="_blank">{{ $item->file }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('candidate_resume_edit', $item->id) }}"
                                                class="btn btn-warning btn-sm text-white"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('candidate_resume_delete', $item->id) }}" class="btn btn-danger btn-sm"
                                                onClick="return confirm('Are you sure?');"><i
                                                    class="fas fa-trash-alt"></i></a>
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
