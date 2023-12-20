@extends('front.layouts.app')

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/' . $global_banner_data->banner_candidate_panel) }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Resume Create</h2>
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
                        See All</a>
                    <form action="{{ route('candidate_resume_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Name *</label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">File *</label>
                                <div class="form-group">
                                    <input type="file" name="file" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
