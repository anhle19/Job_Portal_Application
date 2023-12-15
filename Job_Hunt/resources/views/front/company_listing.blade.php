@extends('front.layouts.app')

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/' . 'banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2> Company Listing </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="job-result">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="job-filter">
                        <form action="{{ url('company-listing') }}" method="get">
                            <div class="widget">
                                <h2>Company Name</h2>
                                <input type="text" name="company_name" class="form-control"
                                    placeholder="Search Company Name ..." value="{{ $form_data['company_name'] }}"/>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget">
                                <h2>Company Location</h2>
                                <select name="location" class="form-control select2">
                                    <option value="">Company Location</option>
                                    @foreach ($company_locations as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $form_data['location'])
                                            selected
                                        @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget">
                                <h2>Company Industry</h2>
                                <select name="industry" class="form-control select2">
                                    <option value="">Company Industry</option>
                                    @foreach ($company_industries as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $form_data['industry'])
                                            selected
                                        @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget">
                                <h2>Company Size</h2>
                                <select name="size" class="form-control select2">
                                    <option value="">Company Size</option>
                                    @foreach ($company_sizes as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $form_data['size'])
                                            selected
                                        @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget">
                                <h2>Founded On</h2>
                                <select name="founded_on" class="form-control select2">
                                    <option value="">Founded On</option>
                                    @for ($i = 1900; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}" @if ($item->id == $form_data['founded_on'])
                                            selected
                                        @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                                <div class="clearfix"></div>
                            </div>

                            <div class="filter-button">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Filter
                                </button>
                            </div>
                        </form>

                        @if ($advertisement->company_listing_ad_status == 'Show')
                        <div class="advertisement">
                            @if ($advertisement->company_listing_ad == null)
                            <a href=""><img src="{{ asset('uploads/ad_default.png') }}" alt="" /></a>
                            @else
                            <a href="{{ $advertisement->company_listing_ad_url }}" target="_blank"><img src="{{ asset('uploads/'.$advertisement->company_listing_ad) }}" alt="" /></a>
                            @endif
                        </div> 
                        @endif
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="job">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-result-header">
                                        <i class="fas fa-search"></i> Search
                                        Result for Company Listing
                                    </div>
                                </div>
                                @if ($companies->count() == 0)
                                    <div class="text-danger">No Result Found</div>
                                @else
                                    @foreach ($companies as $item)
                                        <div class="col-md-12">
                                            <div class="item d-flex justify-content-start">
                                                <div class="logo">
                                                    <img src="{{ asset('uploads/' . $item->logo) }}" alt="" />
                                                </div>
                                                <div class="text">
                                                    <h3>
                                                        <a href="{{ route('company', $item->id) }}">{{ $item->company_name }}</a>
                                                    </h3>
                                                    <div class="detail-1 d-flex justify-content-start">
                                                        <div class="category">
                                                            {{ $item->rCompanyIndustry->name }}
                                                        </div>
                                                        <div class="location">
                                                            {{ $item->rCompanyLocation->name }}
                                                        </div>
                                                    </div>
                                                    <div class="detail-2 d-flex justify-content-start">
                                                        {!! $item->description !!}
                                                    </div>
                                                    <div class="open-position">
                                                        <span class="badge bg-primary">{{ $item->r_job_count }} Open Positions</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-12">
                                        {{-- Giữ lại url khi phân trang --}}
                                        {{ $companies->appends($_GET)->links() }}
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
