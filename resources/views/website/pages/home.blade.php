@extends('layouts.website')
@section('title', 'Home')
@section('content')
    <!-- banner-section -->
    <section class="banner-section centred py-0">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banners as $key => $banner)
                    <div class="carousel-item @if ($key == 0) active @endif">
                        <img class="d-block w-100" src="{{ $banner->image_url }}" alt="Second slide">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="auto-container carousel-data">
            <div class="row clearfix">
                <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 content-column">
                    <div class="content-box">
                        <h1>Search your university <br />in one Click</h1>
                        <p>best universities in china in .</p>
                        <div class="form-inner">
                            <form action="{{ route('programs') }}" method="GET">
                                @csrf
                                <div class="input-inner clearfix">
                                    <div class="form-group">
                                        <i class="icon-2"></i>
                                        {{-- <input type="search" name="name" placeholder="Search university name..."
                                            required=""> --}}
                                        <select class="wide form-select form-control" id="uni_id" name='uni_id'>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <i class="icon-3"></i>
                                        <select class="wide form-select form-control" id="city_id" name='city_id'>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <i class="icon-4"></i>
                                        <select class="wide" name="discipline_id" id="discipline_id">
                                            @foreach ($disciplines as $discipline)
                                                <option value="">Select Course</option>
                                                <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="btn-box">
                                        <button type="submit"><i class="icon-2"></i>Search</button>
                                    </div>
                                </div>
                            </form>
                            {{-- <ul class="radio-select-box clearfix">
                                <li>
                                    <div class="single-checkbox">
                                        <input type="radio" name="check-box" id="check1" checked="">
                                        <label for="check1"><span></span>All</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-checkbox">
                                        <input type="radio" name="check-box" id="check2">
                                        <label for="check2"><span></span>Education</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-checkbox">
                                        <input type="radio" name="check-box" id="check3">
                                        <label for="check3"><span></span>Restaurant</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-checkbox">
                                        <input type="radio" name="check-box" id="check4">
                                        <label for="check4"><span></span>Real Estate</label>
                                    </div>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- banner-section end -->


    <!-- category-section -->
    <section class="category-section centred sec-pad">
        <div class="auto-container">
            <div class="sec-title">
                <span>Categories</span>
                <h2>Explore by Courses</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore
                    <br />dolore magna aliqua enim.
                </p>
            </div>
            <div class="inner-content clearfix">
                @foreach ($disciplines as $discipline)
                    <div class="category-block-one wow fadeInDown animated animated" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <div class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-bookmarks" viewBox="0 0 16 16">
                                    <path
                                        d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z" />
                                    <path
                                        d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z" />
                                </svg>
                            </div>
                            <h5>{{ $discipline->name }}</h5>
                            <span>{{ $discipline->courses_count }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="more-btn"><a href="{{ route('allCourses') }}" class="theme-btn-one">All Courses</a></div>
        </div>
    </section>
    <!-- category-section end -->


    <!-- feature-section -->
    {{-- <section class="feature-section sec-pad">
        <div class="pattern-layer" style="background-image: url({{ asset('website/assets/images/shape/shape-3.png') }});">
        </div>
        <div class="auto-container">
            <div class="sec-title centred">
                <span>Popular</span>
                <h2>Most popular Cities</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore
                    <br />dolore magna aliqua enim.
                </p>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-1.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(32)</a></li>
                            </ul>
                            <h5>$3,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-1.png') }}" alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-2.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(25)</a></li>
                            </ul>
                            <h5>$2,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-2.png') }}'"
                                        alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-3.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(30)</a></li>
                            </ul>
                            <h5>$3,500.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-3.png') }}" alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-1.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(32)</a></li>
                            </ul>
                            <h5>$3,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-1.png') }}'"
                                        alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-2.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(25)</a></li>
                            </ul>
                            <h5>$2,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-2.png') }}'"
                                        alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-3.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(30)</a></li>
                            </ul>
                            <h5>$3,500.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-3.png') }}" alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-1.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(32)</a></li>
                            </ul>
                            <h5>$3,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-1.png') }}'"
                                        alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-2.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(25)</a></li>
                            </ul>
                            <h5>$2,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-2.png') }}'"
                                        alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-3.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(30)</a></li>
                            </ul>
                            <h5>$3,500.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-3.png') }}" alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-1.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(32)</a></li>
                            </ul>
                            <h5>$3,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-1.png') }}'"
                                        alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-2.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(25)</a></li>
                            </ul>
                            <h5>$2,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-2.png') }}'"
                                        alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-3.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(30)</a></li>
                            </ul>
                            <h5>$3,500.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-3.png') }}" alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-1.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(32)</a></li>
                            </ul>
                            <h5>$3,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-1.png') }}'"
                                        alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-2.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(25)</a></li>
                            </ul>
                            <h5>$2,000.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-2.png') }}'"
                                        alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
                <div class="feature-block-one">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('website/assets/images/resource/feature-3.jpg') }}"
                                    alt="">
                            </figure>
                            <div class="shape"></div>
                            <div class="feature">Featured</div>
                            <div class="icon">
                                <div class="icon-shape"></div>
                                <i class="icon-16"></i>
                            </div>
                            <ul class="rating clearfix">
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><i class="icon-17"></i></li>
                                <li><a href="index.html">(30)</a></li>
                            </ul>
                            <h5>$3,500.00</h5>
                        </div>
                        <div class="lower-content">
                            <div class="author-box">
                                <div class="inner">
                                    <img src="{{ asset('website/assets/images/resource/author-3.png') }}" alt="">
                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                    <span>For sell</span>
                                </div>
                            </div>
                            <div class="category"><i class="fas fa-tags"></i>
                                <p>Electronics</p>
                            </div>
                            <h3>Villa on Grand Avenue </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- feature-section end -->


    <!-- testimonial-section -->
    <section class="testimonial-section bg-color-1 sec-pad">
        <figure class="image-layer"><img src="{{ asset('website/assets/images/resource/testimonial-image-1.png') }}"
                alt="">
        </figure>
        <div class="anim-icon">
            <div class="icon anim-icon-1 rotate-me"
                style="background-image: url({{ asset('website/assets/images/icons/anim-icon-1.png') }});">
            </div>
            <div class="icon anim-icon-2 rotate-me"
                style="background-image: url({{ asset('website/assets/images/icons/anim-icon-2.png') }});">
            </div>
            <div class="icon anim-icon-3 rotate-me"
                style="background-image: url({{ asset('website/assets/images/icons/anim-icon-2.png') }});">
            </div>
            <div class="icon anim-icon-4 rotate-me"
                style="background-image: url({{ asset('website/assets/images/icons/anim-icon-1.png') }});">
            </div>
        </div>
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{ asset('website/assets/images/shape/shape-4.png') }});">
            </div>
            <div class="pattern-2" style="background-image: url({{ asset('website/assets/images/shape/shape-5.png') }});">
            </div>
            <div class="pattern-3" style="background-image: url({{ asset('website/assets/images/shape/shape-6.png') }});">
            </div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-12 col-md-12 inner-column">
                    <div class="inner-box">
                        <div class="sec-title light">
                            <span>Testimonials</span>
                            <h2>What client’s say?</h2>
                        </div>
                        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                            <div class="testimonial-content">
                                <div class="text">
                                    <p>“ Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. enim minim veniam quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip consequat aute ux irure
                                        dolor in reprehen.”</p>
                                </div>
                                <div class="author-box">
                                    <figure class="author-thumb"><img
                                            src="{{ asset('website/assets/images/resource/testimonial-1.png') }}"
                                            alt="">
                                    </figure>
                                    <h3>Amelia Anna</h3>
                                    <span class="designation">Senior Martketer</span>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="text">
                                    <p>“ Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. enim minim veniam quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip consequat aute ux irure
                                        dolor in reprehen.”</p>
                                </div>
                                <div class="author-box">
                                    <figure class="author-thumb"><img
                                            src="{{ asset('website/assets/images/resource/testimonial-1.png') }}"
                                            alt="">
                                    </figure>
                                    <h3>Amelia Anna</h3>
                                    <span class="designation">Senior Martketer</span>
                                </div>
                            </div>
                            <div class="testimonial-content">
                                <div class="text">
                                    <p>“ Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. enim minim veniam quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip consequat aute ux irure
                                        dolor in reprehen.”</p>
                                </div>
                                <div class="author-box">
                                    <figure class="author-thumb"><img
                                            src="{{ asset('website/assets/images/resource/testimonial-1.png') }}"
                                            alt="">
                                    </figure>
                                    <h3>Amelia Anna</h3>
                                    <span class="designation">Senior Martketer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-section end -->


    <!-- feature-style-two -->
    <section class="feature-style-two">
        <div class="auto-container">
            <div class="sec-title centred">
                <span>Features</span>
                <h2>Featured Universities</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore
                    <br />dolore magna aliqua enim.
                </p>
            </div>
            <div class="tabs-box">
                <div class="tab-btn-box centred">
                    {{-- <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab-1">Recent Listing</li>
                        <li class="tab-btn" data-tab="#tab-2">Popular Listing</li>
                    </ul> --}}
                </div>
                <div class="tabs-content">
                    <div class="tab active-tab" id="tab-1">
                        <div class="row clearfix">
                            @foreach ($featuredUnis as $uni)
                                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="600ms"
                                        data-wow-duration="1500ms">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image" style="height:220px"><img
                                                        src="{{ $uni->images[0]->image_url }}" alt=""></figure>
                                                <div class="shape"></div>
                                                <div class="feature">Featured</div>
                                                <div class="icon">
                                                    <div class="icon-shape"></div>
                                                    <i class="icon-16"></i>
                                                </div>
                                            </div>
                                            <div class="lower-content">
                                                {{-- <div class="category"><i class="fas fa-tags"></i>
                                                    <p>Electronics</p>
                                                </div> --}}
                                                <h3><a href="{{ route('university-detail', $uni->id) }}">
                                                        @if (strlen($uni->name) > 70)
                                                            {{ substr($uni->name, 0, 70) }}...
                                                        @else
                                                            {{ $uni->name }}
                                                        @endif
                                                    </a></h3>
                                                {{-- <ul class="rating clearfix">
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><i class="icon-17"></i></li>
                                                    <li><a href="index.html">(32)</a></li>
                                                </ul> --}}
                                                @php
                                                    $des = substr($uni->description, 0, 30);
                                                @endphp
                                                <div class="info clearfix" style="min-height: 52px;">
                                                    {!! $des !!}...
                                                </div>
                                                <div class="lower-box">
                                                    <h5><span><i class="far fa-clock"></i>
                                                            Courses:</span>{{ $uni->courses_count }}
                                                    </h5>
                                                    <ul class="react-box">
                                                        <li><i class="fas fa-map-marker-alt"></i> {{ $uni->country }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab" id="tab-2">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                <div class="feature-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="{{ asset('website/assets/images/resource/feature-1.jpg') }}"
                                                    alt="">
                                            </figure>
                                            <div class="shape"></div>
                                            <div class="feature">Featured</div>
                                            <div class="icon">
                                                <div class="icon-shape"></div>
                                                <i class="icon-16"></i>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="author-box">
                                                <div class="inner">
                                                    <img src="{{ asset('website/assets/images/resource/author-1.png') }}'"
                                                        alt="">
                                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                                    <span>For sell</span>
                                                </div>
                                            </div>
                                            <div class="category"><i class="fas fa-tags"></i>
                                                <p>Electronics</p>
                                            </div>
                                            <h3><a href="browse-ads-details.html">Villa on Grand Avenue</a></h3>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(32)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>1 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span>$3,000.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                <div class="feature-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="{{ asset('website/assets/images/resource/feature-2.jpg') }}"
                                                    alt="">
                                            </figure>
                                            <div class="shape"></div>
                                            <div class="feature">Featured</div>
                                            <div class="icon">
                                                <div class="icon-shape"></div>
                                                <i class="icon-16"></i>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="author-box">
                                                <div class="inner">
                                                    <img src="{{ asset('website/assets/images/resource/author-2.png') }}'"
                                                        alt="">
                                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                                    <span>For sell</span>
                                                </div>
                                            </div>
                                            <div class="category"><i class="fas fa-tags"></i>
                                                <p>Electronics</p>
                                            </div>
                                            <h3><a href="browse-ads-details.html">Villa on Grand Avenue</a></h3>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(25)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>2 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span>$2,000.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                <div class="feature-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="{{ asset('website/assets/images/resource/feature-3.jpg') }}"
                                                    alt="">
                                            </figure>
                                            <div class="shape"></div>
                                            <div class="feature">Featured</div>
                                            <div class="icon">
                                                <div class="icon-shape"></div>
                                                <i class="icon-16"></i>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="author-box">
                                                <div class="inner">
                                                    <img src="{{ asset('website/assets/images/resource/author-3.png') }}"
                                                        alt="">
                                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                                    <span>For sell</span>
                                                </div>
                                            </div>
                                            <div class="category"><i class="fas fa-tags"></i>
                                                <p>Electronics</p>
                                            </div>
                                            <h3><a href="browse-ads-details.html">Villa on Grand Avenue</a></h3>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(40)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>3 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span>$3,500.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                <div class="feature-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="{{ asset('website/assets/images/resource/feature-4.jpg') }}"
                                                    alt="">
                                            </figure>
                                            <div class="shape"></div>
                                            <div class="feature">Featured</div>
                                            <div class="icon">
                                                <div class="icon-shape"></div>
                                                <i class="icon-16"></i>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="author-box">
                                                <div class="inner">
                                                    <img src="{{ asset('website/assets/images/resource/author-4.png') }}"
                                                        alt="">
                                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                                    <span>For sell</span>
                                                </div>
                                            </div>
                                            <div class="category"><i class="fas fa-tags"></i>
                                                <p>Electronics</p>
                                            </div>
                                            <h3><a href="browse-ads-details.html">Villa on Grand Avenue</a></h3>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(28)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>4 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span>$3,000.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                <div class="feature-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="{{ asset('website/assets/images/resource/feature-5.jpg') }}"
                                                    alt="">
                                            </figure>
                                            <div class="shape"></div>
                                            <div class="feature">Featured</div>
                                            <div class="icon">
                                                <div class="icon-shape"></div>
                                                <i class="icon-16"></i>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="author-box">
                                                <div class="inner">
                                                    <img src="{{ asset('website/assets/images/resource/author-5.png') }}"
                                                        alt="">
                                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                                    <span>For sell</span>
                                                </div>
                                            </div>
                                            <div class="category"><i class="fas fa-tags"></i>
                                                <p>Electronics</p>
                                            </div>
                                            <h3><a href="browse-ads-details.html">Villa on Grand Avenue</a></h3>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(15)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>5 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span>$1,800.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                <div class="feature-block-one">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image"><img
                                                    src="{{ asset('website/assets/images/resource/feature-6.jpg') }}"
                                                    alt="">
                                            </figure>
                                            <div class="shape"></div>
                                            <div class="feature">Featured</div>
                                            <div class="icon">
                                                <div class="icon-shape"></div>
                                                <i class="icon-16"></i>
                                            </div>
                                        </div>
                                        <div class="lower-content">
                                            <div class="author-box">
                                                <div class="inner">
                                                    <img src="{{ asset('website/assets/images/resource/author-6.png') }}"
                                                        alt="">
                                                    <h6>Michael Bean<i class="icon-18"></i></h6>
                                                    <span>For sell</span>
                                                </div>
                                            </div>
                                            <div class="category"><i class="fas fa-tags"></i>
                                                <p>Electronics</p>
                                            </div>
                                            <h3><a href="browse-ads-details.html">Villa on Grand Avenue</a></h3>
                                            <ul class="rating clearfix">
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><i class="icon-17"></i></li>
                                                <li><a href="index.html">(32)</a></li>
                                            </ul>
                                            <ul class="info clearfix">
                                                <li><i class="far fa-clock"></i>6 months ago</li>
                                                <li><i class="fas fa-map-marker-alt"></i>G87P, Birmingham, UK</li>
                                            </ul>
                                            <div class="lower-box">
                                                <h5><span>Start From:</span>$3,200.00</h5>
                                                <ul class="react-box">
                                                    <li><a href="index.html"><i class="icon-21"></i></a></li>
                                                    <li><a href="index.html"><i class="icon-22"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature-style-two end -->





    <!-- place-section -->
    <section class="place-section centred">
        <div class="auto-container">
            <div class="inner-content border-bottom">
                <div class="sec-title centred">
                    <span>Top Places</span>
                    <h2>Most Popular Cities</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore
                        <br />dolore magna aliqua enim.
                    </p>
                </div>
                <div class="row clearfix d-flex justify-content-center">
                    @foreach ($popular as $city)
                        <div class="col-lg-4 col-md-6 col-sm-12 place-block">
                            <div class="place-block-one wow fadeInDown animated animated" data-wow-delay="00ms"
                                data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{ $city['image'] }}" alt="">
                                    </figure>
                                    <div class="lower-content">
                                        <div class="inner">
                                            <h3><a href="index.html">{{ $city['name'] }}</a></h3>
                                            <span>{{ $city['count'] }} Listing</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- place-section end -->


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


    <!-- download-section -->
    <section class="download-section">
        <div class="pattern-layer"
            style="background-image: url({{ asset('website/assets/images/shape/shape-8.png') }});"></div>
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image image-1"><img src="assets/images/resource/laptop-1.png" alt="">
                        </figure>
                        <figure class="image image-2 rotate-me"><img
                                src="{{ asset('website/assets/images/resource/ball-1.png') }}" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div class="content_block_1">
                        <div class="content-box">
                            <span class="upper-text">Download</span>
                            <h2>Download Our Android and IOS App for Experience</h2>
                            <div class="download-btn">
                                <a href="index.html" class="app-store">
                                    <i class="icon-23"></i>
                                    <span>Download on</span>
                                    <h4>App Store</h4>
                                </a>
                                <a href="index.html" class="play-store">
                                    <i class="icon-24"></i>
                                    <span>Get It On</span>
                                    <h4>Google Play</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- download-section end -->


    <!-- news-section -->
    {{-- <section class="news-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <span>News & Article</span>
                <h2>Students</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{ asset('website/assets/images/news/news-1.jpg') }}" alt="">
                                <a href="blog-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="lower-content">
                                <figure class="admin-thumb"><img
                                        src="{{ asset('website/assets/images/news/admin-1.png') }}" alt="">
                                </figure>
                                <span class="category">Electronics</span>
                                <h3><a href="blog-details.html">Including animation in your design system</a></h3>
                                <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor incididunt
                                    labore.</p>
                                <span class="post-info">By <a href="blog-details.html">Eva Green</a> - October
                                    13, 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInDown animated animated" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{ asset('website/assets/images/news/news-2.jpg') }}" alt="">
                                <a href="blog-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="lower-content">
                                <figure class="admin-thumb"><img
                                        src="{{ asset('website/assets/images/news/admin-2.png') }}" alt="">
                                </figure>
                                <span class="category">Electronics</span>
                                <h3><a href="blog-details.html">A digital prescription for the industry.</a></h3>
                                <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor incididunt
                                    labore.</p>
                                <span class="post-info">By <a href="blog-details.html">Eva Green</a> - October
                                    13, 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                    <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                        data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{ asset('website/assets/images/news/news-3.jpg') }}" alt="">
                                <a href="blog-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="lower-content">
                                <figure class="admin-thumb"><img
                                        src="{{ asset('website/assets/images/news/admin-3.png') }}" alt="">
                                </figure>
                                <span class="category">Electronics</span>
                                <h3><a href="blog-details.html">Strategic & commercial approach with issues.</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet consectur adipisicing sed do eiusmod tempor incididunt
                                    labore.</p>
                                <span class="post-info">By <a href="blog-details.html">Eva Green</a> - October
                                    13, 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- news-section end -->


    <!-- subscribe-section -->
    <section class="subscribe-section">
        <div class="pattern-layer"
            style="background-image: url({{ asset('website/assets/images/shape/shape-9.png') }});"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                    <div class="text">
                        <div class="icon-box"><i class="icon-25"></i></div>
                        <h2>Subscribe to Newsletter</h2>
                        <p>and receive new ads in inbox</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                    <form action="contact.html" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Inout your email address" required="">
                            <button type="submit" class="theme-btn-one">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe-section end -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#uni_id').select2({
                minimumInputLength: 3,
                placeholder: "Search university",
                ajax: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    url: '/courses/get-university',
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
                    url: '/courses/get-city',
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
