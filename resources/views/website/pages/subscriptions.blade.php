@extends('layouts.website')
@section('title', 'Subscriptions')
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url(assets/images/background/page-title.jpg);">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>Subscription Packages</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Subscription Packages</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- pricing-section -->
    <section class="pricing-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <span>Pricing Table</span>
                <h2>No Any Hidden Charge Select <br />Your Pricing Plan</h2>
            </div>
            <div class="row clearfix">
                @php
                    $key = 0;
                @endphp
                @foreach ($packages as $package)
                    @php
                        $key += 1;
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                        <div class="pricing-block-one @if ($key / 2 == 1) active @endif">
                            <div class="pricing-table">
                                <div class="teble-header">
                                    <p>{{ $package->name }}</p>
                                    <h2>${{ $package->price }} <span>/ {{ $package->program_no }} prg</span></h2>
                                </div>
                                <div class="table-content">
                                    <ul class="list clearfix">
                                        <li>{{ $package->program_no }} Programs</li>
                                        <li class="{{ $package->coaching ? '' : 'light' }}">Coaching</li>
                                    </ul>
                                </div>
                                <div class="table-footer">
                                    <a href="{{ Auth::user() ? route('dashboard') : route('login') }}">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- pricing-section end -->
@endsection
@section('scripts')

@endsection
