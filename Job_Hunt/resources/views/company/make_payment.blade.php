@extends('front.layouts.app')

@section('main-content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/' . 'banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dashboard</h2>
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
                    <h4>Current Plan</h4>
                    <div class="row box-items mb-4">
                        <div class="col-md-4">
                            <div class="box1">
                                <h4>$19</h4>
                                <p>Basic</p>
                            </div>
                        </div>
                    </div>

                    <h4>Upgrade Plan (Make Payment)</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Pay with PayPal</td>
                                <td>
                                    <a href="" class="btn btn-primary"
                                        >Pay with PayPal</a
                                    >
                                </td>
                            </tr>
                            <tr>
                                <td>Pay with Stripe</td>
                                <td>
                                    <a href="" class="btn btn-primary"
                                        >Pay with Card</a
                                    >
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
