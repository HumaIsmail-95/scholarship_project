@extends('layouts.website')
@section('title', 'Privacy Policy')
@section('content')
    <!-- about-section -->
    <section class="about-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                    <div class="content_block_3">
                        <div class="content-box">
                            <div class="sec-title">
                                <span>About</span>
                                <h2>Privacy Policy</h2>
                            </div>
                            <div class="text">
                                <p>{!! $privacy->privacy_policy !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                    <div class="image_block_1">
                        <div class="image-box">
                            <div class="image-pattern">
                                <div class="pattern-1" style="background-image: url(assets/images/shape/shape-16.png);">
                                </div>
                                <div class="pattern-2" style="background-image: url(assets/images/shape/shape-16.png);">
                                </div>
                            </div>
                            <figure class="image"><img src="assets/images/resource/about-1.jpg" alt=""></figure>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- about-section end -->


@endsection
@section('scripts')

@endsection
