@extends('layouts.website')
@section('title', 'Our Blogs')
@section('content')
    <!-- Page Title -->
    <section class="page-title style-two" style="background-image: {{ $banner->image_url }});">
        <div class="auto-container">
            <div class="content-box centred mr-0">
                <div class="title">
                    <h1>Blogs</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Blogs</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-standard-content">
                        @forelse ($blogs as $blog)
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ $blog->image_url }}" alt="">
                                        <a href="blog-details.html"><i class="fas fa-link"></i></a>
                                    </figure>
                                    <div class="lower-content p-4">
                                        {{-- <figure class="admin-thumb"><img src="assets/images/news/admin-1.png"
                                                alt="">
                                        </figure> --}}
                                        <span class="category">{{ $blog->sub_heading }}</span>
                                        <h2><a href="{{ route('blogDetail', $blog->id) }}">{{ $blog->heading }}</a></h2>
                                        <p>
                                            @if (strlen($blog->description) > 300)
                                                @php
                                                    $detail = substr($blog->description, 0, 300);
                                                @endphp
                                                {!! $detail !!}...
                                            @else
                                                {!! $blog->description !!}
                                            @endif
                                        </p>
                                        <span class="post-info">By <a href="blog-details.html"></a>{{ $blog->user->name }} -
                                            {{ $blog->created_at }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No Blogs Yet.</p>
                        @endforelse

                        <div class="pagination-wrapper centred">
                            <ul class="pagination clearfix">
                                {{ $blogs->links() }}
                            </ul>
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
