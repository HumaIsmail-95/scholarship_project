@extends('layouts.website')
@section('title', 'University Detail')
@section('content')
    <div class="uni-detail-page">
        @php
            $images = $universityDetail->images;
            $i = 0;
            foreach ($images as $img) {
                if ($img->type == 'logo') {
                    $uniLogo = $img->image_url;
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
                    <h1>
                        <div class="d-flex "><img
                                style="border-radius: 150px;    width: 50px;
                            height: 50px;"
                                src="{{ $uniLogo }}" alt="">&nbsp;
                            {{ $universityDetail->name }}
                        </div>
                    </h1>
                    <span class="category"><i class="fas fa-tags"></i>{{ $universityDetail->country }}</span>
                    <span class="category">
                        @if ($universityDetail->featured)
                            Featured
                        @endif
                    </span>
                </div>
            </div>
        </section>

        <!-- End Page Title -->
        <!-- browse-add-details -->
        <section class="browse-add-details bg-color-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                        <div class="add-details-content">
                            <div class="content-one single-box">
                                <div class="text">
                                    <h3>Description</h3>
                                    {!! $universityDetail->description !!}
                                </div>
                            </div>

                            <div class="content-two single-box">
                                <h3>University Gallery</h3>
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                        </li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($uniGallery as $key => $gal)
                                            <div class="carousel-item @if ($key == 0) active @endif">
                                                <img src="{{ $gal }}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('website/assets/js/product-filter.js') }}"></script>
@endsection
