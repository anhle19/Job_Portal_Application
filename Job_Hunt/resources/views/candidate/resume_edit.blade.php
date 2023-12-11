@extends('front.layouts.app')

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/' . 'banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Resume Edit</h2>
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
                    <a href="{{ route('candidate_resume') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>
                        See All
                    </a>
                    <form action="{{ route('candidate_resume_update', $resume_single->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Name *</label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ $resume_single->name }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Existing File *</label>
                                <div class="form-group">
                                    <a href="{{ $resume_single->file }}" target="_blank">{{ $resume_single->file }}</a>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Change File *</label>
                                <div class="form-group">
                                    <input type="file" name="file" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
