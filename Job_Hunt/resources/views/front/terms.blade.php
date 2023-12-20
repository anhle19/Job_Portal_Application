@extends('front.layouts.app')

@section('seo_title', $term_page_data->title)
@section('seo_meta_description', $term_page_data->meta_description)

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/'.$global_banner_data->banner_terms) }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $term_page_data->heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $term_page_data->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
