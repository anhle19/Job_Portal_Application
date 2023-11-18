@extends('admin.layouts.app')

@section('heading', 'Home Page Content')

@section('main-content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_home_page_update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row custom-tab">
                                <div class="col-lg-3 col-md-12">
                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">

                                        <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-1" type="button" role="tab"
                                            aria-controls="v-pills-1" aria-selected="true">Search</button>

                                        <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-2" type="button" role="tab"
                                            aria-controls="v-pills-2" aria-selected="false">Category</button>

                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                            aria-labelledby="v-pills-1-tab" tabindex="0">
                                            {{-- Search Section Start --}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-4">
                                                        <label class="form-label">Heading *</label>
                                                        <input type="text" class="form-control" name="heading"
                                                            value="{{ $page_home_data->heading }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Text </label>
                                                        <textarea name="text" class="form-control h_100" cols="30" rows="10">{{ $page_home_data->text }}</textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg6 col-md-6">
                                                            <div class="mb-4">
                                                                <label class="form-label">Job Title *</label>
                                                                <input type="text" class="form-control" name="job_title"
                                                                    value="{{ $page_home_data->job_title }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg6 col-md-6">
                                                            <div class="mb-4">
                                                                <label class="form-label">Job Location *</label>
                                                                <input type="text" class="form-control"
                                                                    name="job_location"
                                                                    value="{{ $page_home_data->job_location }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg6 col-md-6">
                                                            <div class="mb-4">
                                                                <label class="form-label">Job Category *</label>
                                                                <input type="text" class="form-control"
                                                                    name="job_category"
                                                                    value="{{ $page_home_data->job_category }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg6 col-md-6">
                                                            <div class="mb-4">
                                                                <label class="form-label">Search *</label>
                                                                <input type="text" class="form-control" name="search"
                                                                    value="{{ $page_home_data->search }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Existing Background *</label>
                                                        <div>
                                                            <img src="{{ asset('uploads/' . $page_home_data->background) }}"
                                                                alt="" class="profile-photo w_300">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Change Background *</label>
                                                        <div>
                                                            <input type="file" class="form-control mt_10"
                                                                name="background">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- Search Section End --}}

                                        </div>

                                        <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel"
                                            aria-labelledby="v-pills-2-tab" tabindex="0">
                                            {{-- Category Section Start --}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-4">
                                                        <label class="form-label">Heading *</label>
                                                        <input type="text" class="form-control" name="job_category_heading"
                                                            value="{{ $page_home_data->job_category_heading }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Sub Heading *</label>
                                                        <input type="text" class="form-control" name="job_category_subheading"
                                                            value="{{ $page_home_data->job_category_subheading }}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Status *</label>
                                                        <select name="job_category_status" class="form-control">
                                                            <option value="Show" @if ($page_home_data->job_category_status == 'Show')
                                                                selected
                                                            @endif>Show</option>
                                                            <option value="Hide" @if ($page_home_data->job_category_status == 'Hide')
                                                                selected
                                                            @endif>Hide</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Category Section End --}}
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Update</button>
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
