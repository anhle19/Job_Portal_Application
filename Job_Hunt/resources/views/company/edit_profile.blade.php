@extends('front.layouts.app')

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/' . 'banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Profile</h2>
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
                            @include('company.sidebar')
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('company_edit_profile_update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Existing Logo</label>
                                @if ($company_data->logo == null)
                                <div class="form-group">
                                    <img src="{{ asset('uploads/default_company_logo.png') }}" alt="" class="logo" />
                                </div>
                                @else
                                <div class="form-group">
                                    <img src="{{ asset('uploads/'.$company_data->logo) }}" alt="" class="logo" />
                                </div>    
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Change Logo</label>
                                <div class="form-group">
                                    <input type="file" name="logo" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Name *</label>
                                <div class="form-group">
                                    <input type="text" name="company_name" class="form-control" value="{{ $company_data->company_name }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Contact Person *</label>
                                <div class="form-group">
                                    <input type="text" name="person_name" class="form-control" value="{{ $company_data->person_name }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Username *</label>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" value="{{ $company_data->username }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email *</label>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" value="{{ $company_data->email }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone </label>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" value="{{ $company_data->phone }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address </label>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control"
                                        value="{{ $company_data->address }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Location </label>
                                <div class="form-group">
                                    <select name="company_location_id" class="form-control select2">
                                        @foreach ($company_locations as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $company_data->company_location_id) selected @endif>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Industry </label>
                                <div class="form-group">
                                    <select name="company_industry_id" class="form-control select2">
                                        @foreach ($company_industries as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $company_data->company_industry_id) selected @endif>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach  
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Website</label>
                                <div class="form-group">
                                    <input type="text" name="website" class="form-control"
                                        value="{{ $company_data->website }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Size </label>
                                <div class="form-group">
                                    <select name="company_size_id" class="form-control select2">
                                        @foreach ($company_sizes as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $company_data->company_size_id) selected @endif>
                                            {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Founded On </label>
                                <div class="form-group">
                                    <select name="founded_on" class="form-control select2">
                                        @for ($i = 1900; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}" @if($i == $company_data->founded_on) selected @endif>
                                            {{ $i }}
                                        </option>    
                                        @endfor
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">About Company </label>
                                <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $company_data->description }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Monday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_mon" class="form-control"
                                        value="{{ $company_data->oh_mon }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Tuesday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_tue" class="form-control"
                                        value="{{ $company_data->oh_tue }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Wednesday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_wed" class="form-control"
                                        value="{{ $company_data->oh_wed }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Thursday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_thu" class="form-control"
                                        value="{{ $company_data->oh_thu }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Friday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_fri" class="form-control"
                                        value="{{ $company_data->oh_fri }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Saturday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_sat" class="form-control"
                                        value="{{ $company_data->oh_sat }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Sunday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_sun" class="form-control"
                                        value="{{ $company_data->oh_sun }}" />
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Location Map (Google Map Code)</label>
                                <div class="form-group">
                                    <textarea name="map_code" class="form-control h-150" cols="30" rows="10">{{ $company_data->map_code }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Facebook</label>
                                <div class="form-group">
                                    <input type="text" name="facebook" class="form-control"
                                        value="{{ $company_data->facebook }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Twitter</label>
                                <div class="form-group">
                                    <input type="text" name="twitter" class="form-control"
                                        value="{{ $company_data->twitter }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Linkedin</label>
                                <div class="form-group">
                                    <input type="text" name="linkedin" class="form-control"
                                        value="{{ $company_data->linkedin }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Instagram</label>
                                <div class="form-group">
                                    <input type="text" name="instagram" class="form-control"
                                        value="{{ $company_data->instagram }}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
