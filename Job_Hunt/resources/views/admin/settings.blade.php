@extends('admin.layouts.app')

@section('heading', 'Settings')

@section('main-content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_settings_update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Existing Logo *</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$settings->logo) }}" alt="" class="w_150">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Logo</label>
                                <input type="file" class="form-control" name="logo">
                            </div>
                            <div class="form-group mb-3">
                                <label>Existing Favicon *</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$settings->favicon) }}" alt="" class="w_150">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Favicon</label>
                                <input type="file" class="form-control" name="favicon">
                            </div>
                            <div class="form-group mb-3">
                                <label>Top Bar Phone </label>
                                <input type="text" class="form-control" name="top_bar_phone" value="{{ $settings->top_bar_phone }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Top Bar Email </label>
                                <input type="text" class="form-control" name="top_bar_email" value="{{ $settings->top_bar_email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Footer Phone </label>
                                <input type="text" class="form-control" name="footer_phone" value="{{ $settings->footer_phone }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Footer Email </label>
                                <input type="text" class="form-control" name="footer_email" value="{{ $settings->footer_email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Footer Address </label>
                                <input type="text" class="form-control" name="footer_address" value="{{ $settings->footer_address }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Facebook </label>
                                <input type="text" class="form-control" name="facebook" value="{{ $settings->facebook }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Twitter </label>
                                <input type="text" class="form-control" name="twitter" value="{{ $settings->twitter }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Linkedin </label>
                                <input type="text" class="form-control" name="linkedin" value="{{ $settings->linkedin }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Pinterest </label>
                                <input type="text" class="form-control" name="pinterest" value="{{ $settings->pinterest }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Instagram </label>
                                <input type="text" class="form-control" name="instagram" value="{{ $settings->instagram }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Copyright Text *</label>
                                <input type="text" class="form-control" name="copyright_text" value="{{ $settings->copyright_text }}">
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
