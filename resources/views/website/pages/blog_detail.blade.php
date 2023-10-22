@extends('layouts.website')
@section('title', 'Blog Detail')
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: {{ $banner->image_url }});">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>Blog Detail</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Blog Detail</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{ $blog->image_url }}" alt="">
                                </figure>
                                <div class="lower-content">
                                    {{-- <figure class="admin-thumb"><img src="assets/images/news/admin-1.png" alt="">
                                    </figure> --}}
                                    <span class="category">{{ $blog->sub_heaind }}</span>
                                    <h2>{{ $blog->heading }}</h2>
                                    <span class="post-info">By <a href="Javascript:;">{{ $blog->user->name }}</a> -
                                        {{ $blog->created_at }}</span>
                                    <div class="text">
                                        {!! $blog->description !!}
                                    </div>
                                    {{-- 
                                    <div class="post-share-option clearfix">
                                        <div class="text pull-left">
                                            <h3>We Are Social On:</h3>
                                        </div>
                                        <ul class="social-links pull-right clearfix">
                                            <li><a href="blog-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="blog-details.html"><i class="fab fa-google-plus-g"></i></a></li>
                                            <li><a href="blog-details.html"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar default-sidebar">
                        <div class="post-widget sidebar-widget">
                            <div class="widget-title">
                                <h3>Recent Posts</h3>
                            </div>
                            <div class="post-inner">
                                @forelse ($recentBlogs as $recent)
                                    <div class="post">
                                        <figure class="post-thumb"><a href="{{ route('blogDetail', $recent->id) }}"><img
                                                    src="{{ $recent->image_url }}" alt=""></a></figure>
                                        <h5><a href="{{ route('blogDetail', $recent->id) }}">
                                                @if (strlen($recent->description) > 20)
                                                    @php
                                                        $sub = substr($recent->description, 0, 20);
                                                    @endphp
                                                    {!! $sub !!}
                                                @else
                                                    {!! $sub !!}
                                                @endif
                                            </a></h5>
                                        <p>{{ $recent->created_at }}</p>
                                    </div>
                                @empty
                                    <div class="post">
                                        No Blogs Yet
                                    </div>
                                @endforelse

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->

@endsection
@section('scripts')

@endsection
