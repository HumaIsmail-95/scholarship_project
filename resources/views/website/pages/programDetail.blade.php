@extends('layouts.website')
@section('title', 'Programs Detail')
@section('content')
    <div class="program-detail-page">







        @php
            $images = $programDetail->university->images;
            $i = 0;
            foreach ($images as $img) {
                if ($img->type == 'logo') {
                    $logo = $img->image_url;
                } elseif ($img->type == 'banner') {
                    $banner = $img->image_url;
                } elseif ($img->type == 'UniGallery') {
                    $uniGallery[$i] = $img->image_url;
                    $i += 1;
                }
            }
        @endphp

        <!-- Page Title -->
        <section class="page-title-2" style="background-image: url({{ $banner }});">
            <div class="auto-container">
                <div class="content-box">
                    <h1>{{ $programDetail->name }}</h1>
                    <span class="category"><i class="fas fa-tags"></i>{{ $programDetail->country_id }},
                        {{ $programDetail->city->cityName }}</span>
                    <span class="category">Featured</span>
                </div>
                <div class="info-box clearfix">
                    <div class="left-column pull-left clearfix">
                        <div class="image-box"><img src="{{ $logo }}" alt=""></div>
                        <h4>Field: {{ $programDetail->discipline->name }}<i class="icon-18"></i></h4>
                        <h4>
                            Discipline: {{ $programDetail->degree->name }} </h4>

                        {{-- <ul class="rating clearfix">
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><i class="icon-17"></i></li>
                            <li><a href="index.html">(32)</a></li>
                        </ul> --}}
                        <span class="sell">{{ $programDetail->studyModel->name }}</span>

                    </div>
                    <div class="right-column pull-right clearfix">
                        <h5><span>Tuition Fee:</span>$ {{ $programDetail->tuition_fee }}</h5>
                        <h6>
                            @if ($programDetail->tuition_fee_type == 1)
                                Yearly
                            @elseif($programDetail->tuition_fee_type == 2)
                                per Semester
                            @elseif($programDetail->tuition_fee_type == 3)
                                per Month
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Page Title -->
        <!-- browse-add-details -->
        <section class="browse-add-details bg-color-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="add-details-content">
                            <div class="content-one single-box">
                                <div class="text">
                                    <h3>Description</h3>
                                    {!! $programDetail->description !!}
                                </div>
                            </div>
                            <div class="content-two single-box">
                                <h3>University Gallery</h3>
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        @foreach ($uniGallery as $gal)
                                            <div class="carousel-item ">
                                                <img src="{{ $gal }}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="content-three single-box">
                                <div class="text">
                                    <h3>Features:</h3>
                                    <ul class="list-item clearfix">
                                        <li>256GB PCI flash storage</li>
                                        <li>2.7 GHz dual-core Intel Core i5 processor</li>
                                        <li>Turbo Boost up to 3.1GHz</li>
                                        <li>Intel Iris Graphics 6100</li>
                                        <li>8GB memory (up from 4GB in 2013 model)</li>
                                        <li>1 Year international warranty</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content-four single-box">
                                <div class="text">
                                    <h3>Location</h3>
                                </div>
                                <div class="contact-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55945.16225505631!2d-73.90847969206546!3d40.66490264739892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1601263396347!5m2!1sen!2sbd"></iframe>
                                </div>
                                <ul class="info-box clearfix">
                                    <li><span>Address:</span> Virginia drive temple hills</li>
                                    <li><span>Country:</span> United State</li>
                                    <li><span>State/county:</span> California</li>
                                    <li><span>Neighborhood:</span> Andersonville</li>
                                    <li><span>Zip/Postal Code:</span> 2403</li>
                                    <li><span>City:</span> Brooklyn</li>
                                </ul>
                            </div>
                            <div class="content-five single-box">
                                <div class="text">
                                    <h4>Leave a Review</h4>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                </div>
                                <form action="browse-add-details.html" method="post" class="review-form">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <div class="form-group">
                                                <label>Your Name*</label>
                                                <input type="text" name="name" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 column">
                                            <div class="form-group">
                                                <label>Your Email*</label>
                                                <input type="email" name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <label>Review Title*</label>
                                                <input type="text" name="title" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <label>Your Rating*</label>
                                                <ul class="rating clearfix">
                                                    <li><i class="icon-32"></i></li>
                                                    <li><i class="icon-32"></i></li>
                                                    <li><i class="icon-32"></i></li>
                                                    <li><i class="icon-32"></i></li>
                                                    <li><i class="icon-32"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <label>Review Title*</label>
                                                <textarea name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group message-btn">
                                                <button type="submit" class="theme-btn-one">Submit Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar category-sidebar">
                            <div class="sidebar-search sidebar-widget">
                                <div class="widget-title">
                                    <h3>Search</h3>
                                </div>
                                <div class="widget-content">
                                    <form action="category-details.html" method="post" class="search-form">
                                        <div class="form-group">
                                            <input type="search" name="search-field" placeholder="Search Keyword..."
                                                required="">
                                            <button type="submit"><i class="icon-2"></i></button>
                                        </div>
                                        <div class="form-group">
                                            <i class="icon-3"></i>
                                            <select class="wide">
                                                <option data-display="Select Location">Select Location</option>
                                                <option value="1">California</option>
                                                <option value="2">New York</option>
                                                <option value="3">Sun Francis</option>
                                                <option value="4">Shicago</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <i class="icon-4"></i>
                                            <select class="wide">
                                                <option data-display="Select Category">Select Category</option>
                                                <option value="1">Education</option>
                                                <option value="2">Restaurant</option>
                                                <option value="3">Real Estate</option>
                                                <option value="4">Home Appliances</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-category sidebar-widget">
                                <div class="widget-title">
                                    <h3>Category</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list">
                                        <li><a href="category-details.html">All</a></li>
                                        <li><a href="category-details.html">Air Condition</a></li>
                                        <li class="dropdown">
                                            <a href="category-details.html" class="current">Ellectronics</a>
                                            <ul>
                                                <li><a href="category-details.html">Computers</a></li>
                                                <li><a href="category-details.html">Drones</a></li>
                                                <li><a href="category-details.html">Phones</a></li>
                                                <li><a href="category-details.html">Watches</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="category-details.html">Furniture</a></li>
                                        <li class="dropdown">
                                            <a href="category-details.html">Health & Beauty</a>
                                            <ul>
                                                <li><a href="category-details.html">Spa</a></li>
                                                <li><a href="category-details.html">Messages</a></li>
                                                <li><a href="category-details.html">Fitness</a></li>
                                                <li><a href="category-details.html">Injuries</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="category-details.html">Automotive</a></li>
                                        <li><a href="category-details.html">Real Estate</a></li>
                                    </ul>
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
                                            <button type="submit" class="theme-btn-one">Apply price</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- browse-add-details end -->

        <!-- sidebar-page-container -->
        <section class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content">
                            <div class="news-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{ $banner }}" alt="">
                                    </figure>
                                    <div class="lower-content">
                                        <figure class="admin-thumb"><img src="{{ $logo }}" alt="">
                                        </figure>
                                        <span class="category">Featured</span>
                                        <h2>{{ $programDetail->name }}</h2>
                                        <span class="post-info">By <a>{{ $programDetail->country }}</a>
                                            {{ $programDetail->city->cityName }}</span>
                                        <div class="text">
                                            {!! $programDetail->description !!}
                                        </div>
                                        <div class="two-column">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                                    <div class="text-content">
                                                        <h3>Two Most-Cited Reason</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipis cing elit, sed do
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                        <p>enim ad minim veniam quis nostrud exercitat ullamco laboris nisi
                                                            ut aliquip ex ea commodo consequat</p>
                                                        <ul class="list-item clearfix">
                                                            <li>Success is something of which we want.</li>
                                                            <li>People believe that success is difficult.</li>
                                                            <li>The four levels of the healthcare system</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                                    <figure class="image-box"><img src="assets/images/news/news-16.jpg"
                                                            alt=""></figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h3>Two Most-Cited Reason</h3>
                                            <p>Lorem ipsum dolor sit amet consectur adipisicing sed eiusmod tempor
                                                incididunt labore dolore magna aliqua enim ad minim veniam. quis nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                                fugiat nulla pariatur.</p>
                                        </div>
                                        <div class="post-share-option clearfix">
                                            <div class="text pull-left">
                                                <h3>We Are Social On:</h3>
                                            </div>
                                            <ul class="social-links pull-right clearfix">
                                                <li><a href="blog-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="blog-details.html"><i class="fab fa-google-plus-g"></i></a>
                                                </li>
                                                <li><a href="blog-details.html"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-box">
                                <div class="group-title">
                                    <h3>3 Comments</h3>
                                </div>
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="assets/images/news/comment-1.png" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Rebeka Dawson</h5>
                                            <span class="post-date">April 10, 2020</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nos
                                        </p>
                                        <a href="blog-details.html" class="reply-btn"><i
                                                class="fas fa-share"></i>Reply</a>
                                    </div>
                                </div>
                                <div class="comment replay-comment">
                                    <figure class="thumb-box">
                                        <img src="assets/images/news/comment-2.png" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Elizabeth Winstead</h5>
                                            <span class="post-date">April 09, 2020</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nos
                                        </p>
                                        <a href="blog-details.html" class="reply-btn"><i
                                                class="fas fa-share"></i>Reply</a>
                                    </div>
                                </div>
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="assets/images/news/comment-3.png" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>Benedict Cumbatch</h5>
                                            <span class="post-date">April 08, 2020</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nos
                                        </p>
                                        <a href="blog-details.html" class="reply-btn"><i
                                                class="fas fa-share"></i>Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="comments-form-area">
                                <div class="group-title">
                                    <h3>Leave a Review</h3>
                                    <p>Your email address will not be published. Required fields are marked *</p>
                                </div>
                                <form method="post" action="sendemail.php" id="contact-form" class="default-form">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="username" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" required="">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                            <label>Subject</label>
                                            <input type="text" name="subject" required="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <label>Review Title*</label>
                                            <textarea name="message"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                            <button class="theme-btn-one" type="submit" name="submit-form">Submit
                                                Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar default-sidebar">
                            <div class="search-widget sidebar-widget">
                                <div class="widget-title">
                                    <h3>Search</h3>
                                </div>
                                <form action="blog-details.html" method="post" class="search-form default-form">
                                    <div class="form-group">
                                        <input type="search" name="search-field" placeholder="Search" required="">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="social-box sidebar-widget">
                                <div class="widget-title">
                                    <h3>Follow Us On</h3>
                                </div>
                                <ul class="social-links clearfix">
                                    <li><a href="blog-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="blog-details.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href="blog-details.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="blog-details.html"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="blog-details.html"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="sidebar-category sidebar-widget">
                                <div class="widget-title">
                                    <h3>Category</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list">
                                        <li><a href="category-details.html">All</a></li>
                                        <li><a href="category-details.html">Air Condition</a></li>
                                        <li class="dropdown">
                                            <a href="category-details.html" class="current">Ellectronics</a>
                                            <ul>
                                                <li><a href="category-details.html">Computers</a></li>
                                                <li><a href="category-details.html">Drones</a></li>
                                                <li><a href="category-details.html">Phones</a></li>
                                                <li><a href="category-details.html">Watches</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="category-details.html">Furniture</a></li>
                                        <li class="dropdown">
                                            <a href="category-details.html">Health & Beauty</a>
                                            <ul>
                                                <li><a href="category-details.html">Spa</a></li>
                                                <li><a href="category-details.html">Messages</a></li>
                                                <li><a href="category-details.html">Fitness</a></li>
                                                <li><a href="category-details.html">Injuries</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="category-details.html">Automotive</a></li>
                                        <li><a href="category-details.html">Real Estate</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post-widget sidebar-widget">
                                <div class="widget-title">
                                    <h3>Recent Posts</h3>
                                </div>
                                <div class="post-inner">
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.html"><img
                                                    src="assets/images/news/post-1.jpg" alt=""></a></figure>
                                        <h5><a href="blog-details.html">Best interior design idea for your home.</a></h5>
                                        <p>April 12, 2020</p>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.html"><img
                                                    src="assets/images/news/post-2.jpg" alt=""></a></figure>
                                        <h5><a href="blog-details.html">A digital prescription for the pharma industry.</a>
                                        </h5>
                                        <p>April 11, 2020</p>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.html"><img
                                                    src="assets/images/news/post-3.jpg" alt=""></a></figure>
                                        <h5><a href="blog-details.html">Strategic & commercial approach with issues.</a>
                                        </h5>
                                        <p>April 10, 2020</p>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-category-2 sidebar-widget">
                                <div class="widget-title">
                                    <h3>Category</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list clearfix">
                                        <li><a href="blog-details.html">March 2017<span>(9)</span></a></li>
                                        <li><a href="blog-details.html">October 2017<span>(3)</span></a></li>
                                        <li><a href="blog-details.html">October 2017<span>(5)</span></a></li>
                                        <li><a href="blog-details.html">October 2018<span>(2)</span></a></li>
                                        <li><a href="blog-details.html">March 2019<span>(7)</span></a></li>
                                        <li><a href="blog-details.html">October 2019<span>(1)</span></a></li>
                                        <li><a href="blog-details.html">March 2020<span>(8)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tags-widget sidebar-widget">
                                <div class="widget-title">
                                    <h3>Popular Tags</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="tags-list clearfix">
                                        <li><a href="blog-details.html">Real Estate</a></li>
                                        <li><a href="blog-details.html">HouseHunting</a></li>
                                        <li><a href="blog-details.html">Architecture</a></li>
                                        <li><a href="blog-details.html">Interior</a></li>
                                        <li><a href="blog-details.html">Sale</a></li>
                                        <li><a href="blog-details.html">Rent Home</a></li>
                                        <li><a href="blog-details.html">Listing</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->


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
