@extends('layouts.website')
@section('title', 'Programs')
@section('content')
    <div class="program-page">
        <!-- Page Title -->
        <section class="page-title style-two" style="background-image: url({{ $banner->image_url }});">
            <div class="auto-container">
                <div class="content-box centred mr-0">
                    <div class="title">
                        <h1>Programs Detail</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Programs Detail</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- category-details -->
        <section class="category-details bg-color-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar category-sidebar">
                            <form action="{{ route('programs') }}" method="GET" class="search-form">
                                <div class="sidebar-search sidebar-widget">
                                    <div class="widget-title">
                                        <h3>Search</h3>
                                    </div>
                                    <div class="widget-content">
                                        @csrf
                                        <div class="form-group">
                                            {{-- <input type="search" name="name" placeholder="Search Keyword..." required=""> --}}
                                            <select class="wide form-select form-control" id='uni_id' name='uni_id'>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="wide form-select form-control" id='city_id' name='city_id'>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="sidebar-category sidebar-widget">
                                    <div class="widget-title">
                                        <h3>Category</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <select class="wide" name="discipline_id" id="discipline_id">
                                                @foreach ($disciplines as $discipline)
                                                    <option value="">Select Course</option>
                                                    <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-filter sidebar-widget">
                                    <div class="widget-title">
                                        <h3>Pricing range</h3>
                                    </div>
                                    <div class="price-range">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                <input type="text" name="min_price" placeholder="Min">
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                <input type="text" name="max_price" placeholder="Max">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <button type="submit" class="theme-btn-one">Apply filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="category-details-content">
                            <div class="item-shorting clearfix">
                                <div class="text pull-left">
                                    <p><span>Search Reasults:</span> Showing {{ $programs->firstItem() }} to
                                        {{ $programs->lastItem() }} of {{ $programs->total() }} results Listings</p>
                                </div>
                                <div class="right-column pull-right clearfix">
                                    {{-- <div class="select-box">
                                        <select class="wide">
                                            <option data-display="Sort by: Default">Sort by: Default</option>
                                            <option value="1">Default Sort 01</option>
                                            <option value="2">Default Sort 02</option>
                                            <option value="3">Default Sort 03</option>
                                            <option value="4">Default Sort 04</option>
                                        </select>
                                    </div> --}}
                                    <div class="menu-box">
                                        <button class="list-view"><i class="icon-31"></i></button>
                                        <button class="grid-view on"><i class="icon-30"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="category-block wrapper grid">
                                <div class="list-item feature-style-three">
                                    @foreach ($programs as $program)
                                        <div class="feature-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image"><img
                                                            src="{{ $program->university->images[0]->image_url }}"
                                                            alt=""></figure>
                                                    @if ($program->scholarship)
                                                        <div class="feature-2">Scholarship</div>
                                                    @endif
                                                </div>
                                                <div class="lower-content">
                                                    <div class="category"><i class="fas fa-tags"></i>
                                                        <p>{{ $program->discipline->name }}</p>
                                                    </div>
                                                    <h4>
                                                        <a href="{{ route('programDetails', $program->id) }}">
                                                            @if (strlen($program->name) > 40)
                                                                {{ substr($program->name, 0, 40) }}...
                                                            @else
                                                                {{ $program->name }}
                                                            @endif
                                                        </a>
                                                    </h4>
                                                    {{-- <ul class="rating clearfix">
                                                        <li><i class="icon-17"></i></li>
                                                        <li><i class="icon-17"></i></li>
                                                        <li><i class="icon-17"></i></li>
                                                        <li><i class="icon-17"></i></li>
                                                        <li><i class="icon-17"></i></li>
                                                        <li><a href="index.html">(32)</a></li>
                                                    </ul> --}}
                                                    <ul class="info clearfix">
                                                        <li><i class="far fa-clock"></i>
                                                            @if (strlen($program->university->name) > 40)
                                                                {{ substr($program->university->name, 0, 40) }}...
                                                            @else
                                                                {{ $program->university->name }}
                                                            @endif
                                                        </li>
                                                        <li><i class="fas fa-map-marker-alt"></i>
                                                            {{ $program->country }}, {{ $program->city->cityName }}
                                                        </li>
                                                    </ul>
                                                    <div class="lower-box">
                                                        <h5><span>Tuition Fee:</span>${{ $program->tuition_fee }}
                                                            <span></span>
                                                            (@if ($program->tuition_fee_type == 1)
                                                                yearly
                                                            @elseif($program->tuition_fee_type == 2)
                                                                per semster
                                                            @else
                                                                per month
                                                            @endif)
                                                        </h5>
                                                        {{-- <ul class="react-box">
                                                            <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                        </ul> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="grid-item">
                                    <div class="row clearfix">
                                        @foreach ($programs as $program)
                                            <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
                                                <div class="feature-block-one">
                                                    <div class="inner-box">
                                                        <div class="image-box">
                                                            <figure class="image"
                                                                style="min-height:220px;max-height:220px"><img
                                                                    src="{{ $program->university->images[0]->image_url }}"
                                                                    alt="">
                                                            </figure>
                                                            @if ($program->scholarship)
                                                                <div class="shape"></div>
                                                                <div class="feature">Scholarship</div>
                                                                <div class="icon">
                                                                    <div class="icon-shape"></div>
                                                                    <i class="icon-16"></i>
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="lower-content">
                                                            <div class="author-box">
                                                                <div class="inner" style="padding:0px">
                                                                    @if ($program->university->featured)
                                                                        <h6>Featured <i class="icon-18"></i></h6>
                                                                    @endif
                                                                    <span>Apply Now</span>
                                                                </div>
                                                            </div>
                                                            <div class="category"><i class="fas fa-tags"></i>
                                                                <p>{{ $program->discipline->name }}</p>
                                                            </div>
                                                            <h3><a href="{{ route('programDetails', $program->id) }}">
                                                                    @if (strlen($program->name) > 25)
                                                                        {{ substr($program->name, 0, 25) }}...
                                                                    @else
                                                                        {{ $program->name }}
                                                                    @endif
                                                                </a>
                                                            </h3>
                                                            {{-- <ul class="rating clearfix">
                                                                <li><i class="icon-17"></i></li>
                                                                <li><i class="icon-17"></i></li>
                                                                <li><i class="icon-17"></i></li>
                                                                <li><i class="icon-17"></i></li>
                                                                <li><i class="icon-17"></i></li>
                                                                <li><a href="index.html">(32)</a></li>
                                                            </ul> --}}
                                                            <ul class="info clearfix">
                                                                <li><i class="far fa-clock"></i>
                                                                    @if (strlen($program->university->name) > 25)
                                                                        {{ substr($program->university->name, 0, 25) }}...
                                                                    @else
                                                                        {{ $program->university->name }}
                                                                    @endif
                                                                </li>
                                                                <li><i class="fas fa-map-marker-alt"></i>
                                                                    {{ $program->country_id }},
                                                                    {{ $program->city->cityName }}
                                                                </li>
                                                            </ul>
                                                            <div class="lower-box">
                                                                <h5><span>Tuition Fee:</span>${{ $program->tuition_fee }}
                                                                    <span></span>
                                                                </h5>
                                                                (@if ($program->tuition_fee_type == 1)
                                                                    yearly
                                                                @elseif($program->tuition_fee_type == 2)
                                                                    per semster
                                                                @else
                                                                    per month
                                                                @endif)
                                                                <ul class="react-box">
                                                                    {{-- <li><a href="index.html"><i class="icon-21"></i></a>
                                                                    </li> --}}
                                                                    {{-- <li><a href="index.html"><i class="icon-22"></i></a>
                                                                    </li> --}}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="pagination-wrapper centred">
                                <ul class="pagination clearfix">
                                    {{ $programs->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- category-details end -->

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('website/assets/js/product-filter.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#uni_id').select2({
                minimumInputLength: 3,
                placeholder: "Search university",
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    url: '/admin/courses/get-university',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                };
                            })
                        };
                    },
                    error: function(error) {
                        console.log(error);

                    },
                }
            });
            $('#city_id').select2({
                minimumInputLength: 3,
                placeholder: "Search city",
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    delay: 250,
                    url: '/admin/courses/get-city',
                    dataType: 'json',
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.cityName
                                };
                            })
                        };
                    },
                    error: function(error) {
                        console.log(error);

                    },
                }
            });
        });
    </script>
@endsection
