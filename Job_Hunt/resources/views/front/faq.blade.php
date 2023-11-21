@extends('front.layouts.app')

@section('seo_title', $faq_page_data->title)
@section('seo_meta_description', $faq_page_data->meta_description)

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/'.'banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $faq_page_data->heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content faq">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="accordion" id="accordionExample">
                        @php $i=0; @endphp
                        @foreach ($faqs_data as $item)
                        @php $i++; @endphp
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $i }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                                    {{ $item->question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $i }}"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $item->answer !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{ $faqs_data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
