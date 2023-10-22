@extends('layouts.userPanel')
@section('title', 'Home')
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
                <h4 class="text-themecolor">Student Dashboard</h4>
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
        @include('website.components.profile_completion')

        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- End Info box -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
        <!-- ============================================================== -->
        <!-- .row -->

        <div class="row">
            @if (!empty($currentSubscription))
                <div class="col-lg-6">
                    <div class="card bg-info m-b-15">
                        <div class="card-body">
                            <h5 class="text-white card-title text-uppercase">Subscription</h5>
                            <div class="row">
                                <div class="col-12 m-t-30">
                                    <h5 class="text-white">You have subscribed to :
                                        {{ $currentSubscription->package->name }}</h5>
                                    <p class="text-white">
                                        {{ $currentSubscription->package->program_no - Auth::user()->program_no }} used out
                                        of {{ $currentSubscription->package->program_no }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg-6">
                <div class="card bg-info m-b-15">
                    <div class="card-body">
                        <h5 class="text-white card-title text-uppercase">View Application</h5>
                        <div class="row">
                            <div class="col-12 m-t-30">
                                <h5 class="text-white">You applied already? Great, here you can follow-up on your
                                    application process, good luck :)</h5>
                                <a class="btn btn-light" href="{{ route('myApplications') }}">My Application</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    </ul>

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
