@extends('admin.layouts.app')

@section('heading', 'Advertisements')

@section('main-content')
    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_advertisement_update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h4>Job Listing Ad</h4>
                            <div class="form-group mb-3">
                                <label>Existing Job Listing Ad</label>
                                <div>
                                    @if ($advertisement->job_listing_ad == null)
                                    <img src="{{ asset('uploads/ad_default.png') }}" class="w_200" alt="">
                                    @else
                                    <img src="{{ asset('uploads/'.$advertisement->job_listing_ad) }}" class="w_200" alt="">    
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Job Listing Ad</label>
                                <div>
                                    <input type="file" name="job_listing_ad">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Job Listing Ad URL</label>
                                <div>
                                    <input type="text" class="form-control" name="job_listing_ad_url" value="{{ $advertisement->job_listing_ad_url }}">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="job_listing_ad_status" class="form-control select2">
                                    <option value="Show" @if ($advertisement->job_listing_ad_status == 'Show')
                                        selected
                                    @endif>Show</option>
                                    <option value="Hide" @if ($advertisement->job_listing_ad_status == 'Hide')
                                        selected
                                    @endif>Hide</option>
                                </select>
                            </div>

                            <h4>Company Listing Ad</h4>
                            <div class="form-group mb-3">
                                <label>Existing Company Listing Ad</label>
                                <div>
                                    @if ($advertisement->company_listing_ad == null)
                                    <img src="{{ asset('uploads/ad_default.png') }}" class="w_200" alt="">
                                    @else
                                    <img src="{{ asset('uploads/'.$advertisement->company_listing_ad) }}" class="w_200" alt="">    
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Company Listing Ad</label>
                                <div>
                                    <input type="file" name="company_listing_ad">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Company Listing Ad URL</label>
                                <div>
                                    <input type="text" class="form-control" name="company_listing_ad_url" value="{{ $advertisement->company_listing_ad_url }}">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="company_listing_ad_status" class="form-control select2">
                                    <option value="Show" @if ($advertisement->company_listing_ad_status == 'Show')
                                        selected
                                    @endif>Show</option>
                                    <option value="Hide" @if ($advertisement->company_listing_ad_status == 'Hide')
                                        selected
                                    @endif>Hide</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
