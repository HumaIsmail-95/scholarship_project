@extends('layouts.website')
@section('title', 'All Courses')
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: url({{ $banner->image_url }});">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>All Courses</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>All Detail</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- category-style-two -->
    <section class="category-style-two">
        <div class="auto-container">
            <div class="sec-title centred">
                {{-- <span>Features</span> --}}
                <h2>All Courses</h2>
                <p>
                    University courses, also known as college courses or academic programs, are structured educational
                    offerings provided by universities and colleges to help students gain knowledge and expertise in various
                    fields of study. These courses are a fundamental component of higher education and are designed to
                    provide students with a well-rounded education and specialized knowledge in their chosen disciplines.
                </p>
            </div>
            <div class="row clearfix">
                @foreach ($disciplines as $discipline)
                    <div class="col-lg-3 col-md-6 col-sm-12 category-block">
                        <div class="category-block-two wow fadeInDown animated animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/resource/category-1.jpg" alt="">
                                </figure>
                                <div class="lower-content">
                                    <span>{{ $discipline->courses_count }}</span>
                                    <div class="icon-box"><i class="icon-6"></i></div>
                                    <h4><a href="category-details.html">{{ $discipline->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- category-style-two end -->
@endsection
@section('scripts')

@endsection
