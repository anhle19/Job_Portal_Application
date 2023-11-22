@extends('front.layouts.app')

@section('seo_title', $contact_page_data->title)
@section('seo_meta_description', $contact_page_data->meta_description)

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/'.'banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $contact_page_data->heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-form">
                        <form action="{{ route('contact_submit') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input name="person_name" type="text" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input name="person_email" type="text" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea name="person_message" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="map">
                        {!! $contact_page_data->map_code !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
