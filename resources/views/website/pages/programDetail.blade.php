@extends('layouts.website')
@section('title', 'Programs Detail')
@section('content')
    <div class="program-detail-page">
        @php
            $images = $programDetail->university->images;
            $i = 0;
            foreach ($images as $img) {
                if ($img->type == 'logo') {
                    $programLogo = $img->image_url;
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
                        <div class="image-box"><img src="{{ $programLogo }}" alt=""></div>
                        <h4>Field: {{ $programDetail->discipline->name }}<i class="icon-18"></i></h4>
                        <h4>Discipline: {{ $programDetail->degree->name }} </h4>
                        <span class="sell">{{ $programDetail->studyModel->name }}</span>

                        {{-- <ul class="rating clearfix">
                    <li><i class="icon-17"></i></li>
                    <li><i class="icon-17"></i></li>
                    <li><i class="icon-17"></i></li>
                    <li><i class="icon-17"></i></li>
                    <li><i class="icon-17"></i></li>
                    <li><a href="index.html">(32)</a></li>
                </ul> --}}
                        <h6><span></span>$ {{ $programDetail->tuition_fee }}
                            ({{ getTuitionFeeType($programDetail->tuition_fee_type) }})
                        </h6>

                    </div>
                    <div class="right-column pull-right clearfix">
                        @php
                            $user = Auth::user();
                            $applied = App\Models\StudentApplication::where('user_id', $user->id)
                                ->where('course_id', $programDetail->id)
                                ->count();
                        @endphp
                        @if (Auth::user())

                            @if ($applied > 0)
                                <button class="theme-btn-one"><span>Applied
                                    </span></button>
                            @else
                                @if ($user->subscription)
                                    @if ($user->profile_percentage < 100)
                                        <a href="{{ route('myUniApp') }}" class="theme-btn-one"><span>Apply
                                                Now</span></a>
                                    @else
                                        <a href="{{ route('reviewApplication', $programDetail->id) }}"
                                            class="theme-btn-one"><span>Apply
                                                Now</span></a>
                                    @endif
                                @else
                                    <a href="{{ route('subscriptions') }}" class="theme-btn-one"><span>Apply
                                            Now</span></a>
                                @endif
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="theme-btn-one"><span>Apply Now</span></a>
                        @endif
                        {{-- <button type="button" class="theme-btn-one">Apply now</button> --}}

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

                            <div class="content-three single-box">
                                <div class="text">
                                    <h3>General Details:</h3>
                                    <div class="card my-2">
                                        <div class="card-body">
                                            <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg> Institution Name:</p>
                                            <h6>{{ $programDetail->university->name }}</h6>
                                        </div>
                                    </div>
                                    <div class="card  my-2">
                                        <div class="card-body">
                                            <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg> Course Name:</p>
                                            <h6>{{ $programDetail->name }}</h6>
                                        </div>
                                    </div>
                                    <div class="card  my-2">
                                        <div class="card-body">
                                            <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg> Degree Name:</p>
                                            <h6>{{ $programDetail->degree->name }}</h6>
                                        </div>
                                    </div>
                                    <div class="card  my-2">
                                        <div class="card-body">
                                            <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg> Language:</p>
                                            <h6>English</h6>
                                        </div>
                                    </div>
                                    <div class="card  my-2">
                                        <div class="card-body">
                                            <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>Duration:</p>
                                            <h6>{{ $programDetail->duration }}(Semesters)</h6>
                                        </div>
                                    </div>
                                    <div class="card my-2 ">
                                        <div class="card-body">
                                            <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>Tuition Fee::</p>
                                            <h6>{{ $programDetail->tuition_fee }}($)</h6>
                                        </div>
                                    </div>
                                    <div class="card my-2 ">
                                        <div class="card-body">
                                            <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-check-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>Tuition Fee::</p>
                                            <h6>{{ $programDetail->tuition_fee }}($)</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (isset($programDetail->requirements))
                                <div class="content-four single-box">
                                    <div class="text">
                                        <h3>Admission Requirements</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <p>Language requirements
                                        </p>
                                        <p> Any of the followings:</p>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Test Name</th>
                                                    <th scope="col">Minimum Score</th>
                                                    <th scope="col">Minimum Score Level</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($programDetail->requirements as $key => $item)
                                                    <tr>
                                                        <td>{{ $key += 1 }}</td>
                                                        <td>{{ $item->test_name }}</td>
                                                        <td>{{ $item->min_score }}</td>
                                                        <td>{{ $item->min_score_level }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <p class="mt-2">Details on Admission Requirement</p>
                                        <p>{!! $programDetail->requirement_details !!}</p>
                                        @if (isset($programDetail->other_requirements))
                                            <h6 class="mt-2">Other Requirements</h6>
                                            <p>{!! $programDetail->other_requirements !!}</p>
                                        @endif
                                    </div>
                                </div>
                            @endif
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
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar category-sidebar">
                            <div class="sidebar-search sidebar-widget">
                                <div class="widget-title">
                                    <h3>Application Deadline</h3>
                                </div>
                                <div class="widget-content">
                                    @if ($programDetail->season)
                                        <p>Summer starts in {{ $programDetail->season }}</p>
                                    @endif
                                    @if ($programDetail->start_month)
                                        <p>Falls starts in {{ $programDetail->start_month }}</p>
                                    @endif
                                    <p class="my-2">Applications open all year</p>
                                    {{-- <button type="button" class="theme-btn-one mt-2">Apply now</button> --}}
                                    @if (Auth::user())
                                        @if ($applied > 0)
                                            <button class="theme-btn-one"><span>Applied
                                                </span></button>
                                        @else
                                            @if (Auth::user()->subscription)
                                                @if (Auth::user()->profile_percentage < 100)
                                                    <a href="{{ route('myUniApp') }}"
                                                        class="theme-btn-one mt-2"><span>Apply
                                                            Now</span></a>
                                                @else
                                                    <a href="{{ route('reviewApplication', $programDetail->id) }}"
                                                        class="theme-btn-one mt-2"><span>Apply
                                                            Now</span></a>
                                                @endif
                                            @else
                                                <a href="{{ route('subscriptions') }}"
                                                    class="theme-btn-one mt-2"><span>Apply
                                                        Now</span></a>
                                            @endif
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="theme-btn-one mt-2"><span>Apply
                                                Now</span></a>
                                    @endif
                                </div>
                            </div>
                            <div class="sidebar-category sidebar-widget">
                                <div class="widget-title">
                                    <h3>Tuition Fee:</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list">
                                        <li class="item-list">
                                            <h6><span></span>$ {{ $programDetail->tuition_fee }}
                                                {{ getTuitionFeeType($programDetail->tuition_fee_type) }}

                                            </h6>
                                        </li>
                                    </ul>
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
