@extends('layouts.admin')
@yield('title', 'Dashboard')
@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">University Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard </li>
                    </ol>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box -->
        <!-- ============================================================== -->
        <!-- .row -->
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Total Universities</h5>
                        <div class="text-end"> <span class="text-muted">Common</span>
                            <h2> {{ $common_count }}</h2>
                        </div>
                        {{-- <span class="text-success">{{ $common_count }}</span> --}}
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 100%; height:6px;" role="progressbar"> <span
                                    class="sr-only">{{ $common_count }}</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Total Courses</h5>
                        <div class="text-end"> <span class="text-muted">Courses</span>
                            <h2> {{ $course_count }}</h2>
                        </div>
                        {{-- <span class="text-primary">{{ $course_count }}</span> --}}
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 100%; height:6px;" role="progressbar"> <span
                                    class="sr-only">{{ $course_count }}</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Total Student</h5>
                        <div class="text-end"> <span class="text-muted">Student</span>
                            <h2>{{ $student_count }}</h2>
                        </div>
                        {{-- <span class="text-info">{{ $student_count }}</span> --}}
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 100%; height:6px;" role="progressbar"> <span
                                    class="sr-only">{{ $student_count }}</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Featured University</h5>
                        <div class="text-end"> <span class="text-muted">Featured</span>
                            <h2>{{ $featured_count }}</h2>
                        </div>
                        {{-- <span class="text-inverse">{{ $featured_count }}</span> --}}
                        <div class="progress">
                            <div class="progress-bar bg-inverse" style="width: 100%; height:6px;" role="progressbar"> <span
                                    class="sr-only">{{ $featured_count }}</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
        <!-- ============================================================== -->
        <!-- .row -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card bg-info m-b-15">
                    <div class="card-body">
                        <h5 class="text-white card-title text-uppercase">Earnings From Subscriptions </h5>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <h1 class="text-white">${{ $featured['totalPrice'] }}</h1>
                                <p class="text-white">{{ $featured['last_month'] }}</p> <b
                                    class="text-white">({{ $featured['package'] }}
                                    Subscriptions)</b>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <div id="sales1" class="text-end"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card bg-info m-b-15">
                    <div class="card-body">
                        <h5 class="text-white card-title text-uppercase">Students Last Months
                        </h5>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <h1 class="text-white">{{ $student['number'] }}</h1>
                                <p class="text-white">{{ $student['last_month'] }}</p> <b class="text-white">Students</b>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <div id="sales1" class="text-end"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- Comment - table -->
        <!-- ============================================================== -->
        <!-- row -->
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-6 col-lg-3">
                    @php
                        foreach ($course->university->images as $image) {
                            if ($image->type == 'banner') {
                                $banner = $image;
                            }
                        }
                    @endphp
                    <img class="img-responsive" alt="user" src="{{ $banner->image_url }}">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                @if (strlen($course->name) > 44)
                                    {{ substr($course->name, 0, 44) }}...
                                @else
                                    {{ $course->name }}
                                @endif
                            </h5>
                            <p>
                                <span><i class="ti-alarm-clock"></i> {{ $course->duration }}</span>
                            </p>
                            <p>
                                <span><i class="ti-user"></i> {{ $course->city->cityName }}</span>
                            </p>
                            <p>
                                <span><i class="fa fa-graduation-cap"></i> {{ $course->degree->name }}</span></span>
                            </p>
                            {{-- <button class="btn btn-success text-white btn-rounded waves-effect waves-light m-t-10">More
                                Details</button> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- row -->
        <!-- ============================================================== -->
        <!-- End Comment - chats -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme working">4</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a>
                        </li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a>
                        </li>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
@section('scripts')
@endsection
