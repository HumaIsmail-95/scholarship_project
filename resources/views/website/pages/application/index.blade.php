@extends('layouts.userPanel')
@section('links')
@endsection
@section('title', 'My Uni App')
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
                <h4 class="text-themecolor">My Applications</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">My Application</li>
                    </ol>
                </div>
            </div>
        </div>
        @include('website.components.profile_completion')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Applied Courses</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($applications as $application)
                @php
                    foreach ($application->course->university->images as $img) {
                        if ($img->type == 'logo') {
                            $logo = $img->image_url;
                        }
                    }

                @endphp
                <div class="col-lg-6 colmd-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ isset($logo) ? $logo : '' }}" style="width:100px;height:100px" alt="">
                            <h4 class="card-title">{{ $application->course->name }}</h4>
                            <p class="mb-0">{{ $application->course->university->name }}</p>
                            <br />
                            <br />
                            <p class="">Applied on {{ $application->created_at }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
@section('scripts')
    <script>
        function showToaster(icon, heading, text) {
            $.toast({
                heading: heading,
                text: text,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: icon,
                hideAfter: 3500,
                stack: 6
            });
        }
    </script>

@endsection
