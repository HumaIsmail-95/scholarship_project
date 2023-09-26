@extends('layouts.userPanel')
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
                <h4 class="text-themecolor">Set Profile</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard 1</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                            class="fa fa-plus-circle"></i> Create New</button>
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
                        <h5 class="card-title text-uppercase">HTML Course</h5>
                        <div class="text-end"> <span class="text-muted">Monthly Fees</span>
                            <h2><sup><i class="ti-arrow-up text-success"></i></sup> $1200</h2>
                        </div>
                        <span class="text-success">20%</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 20%; height:6px;" role="progressbar"> <span
                                    class="sr-only">60% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Web Development Course</h5>
                        <div class="text-end"> <span class="text-muted">Monthly Fees</span>
                            <h2><sup><i class="ti-arrow-down text-primary"></i></sup> $5000</h2>
                        </div>
                        <span class="text-primary">30%</span>
                        <div class="progress">
                            <div class="progress-bar bg-primary" style="width: 30%; height:6px;" role="progressbar"> <span
                                    class="sr-only">60% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">Web Designing Course</h5>
                        <div class="text-end"> <span class="text-muted">Monthly Fees</span>
                            <h2><sup><i class="ti-arrow-up text-info"></i></sup> $8000</h2>
                        </div>
                        <span class="text-info">60%</span>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 40%; height:6px;" role="progressbar"> <span
                                    class="sr-only">60% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">App Development Course</h5>
                        <div class="text-end"> <span class="text-muted">Yearly Fees</span>
                            <h2><sup><i class="ti-arrow-up text-inverse"></i></sup> $12000</h2>
                        </div>
                        <span class="text-inverse">80%</span>
                        <div class="progress">
                            <div class="progress-bar bg-inverse" style="width: 40%; height:6px;" role="progressbar"> <span
                                    class="sr-only">60% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Student PRofile</h4>
                        {{-- <h6 class="card-subtitle">Use default tab with class <code>vtabs, tabs-vertical & customvtab</code> --}}
                        </h6>
                        <!-- Nav tabs -->
                        <div class="vtabs customvtab">
                            <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#personal_info"
                                        role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                            class="hidden-xs-down">
                                            Personal and Travel Information</span> </a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#professional_exp"
                                        role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span
                                            class="hidden-xs-down">
                                            Education and Professional Experience</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#language_test"
                                        role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span
                                            class="hidden-xs-down">
                                            Language and Test</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#documents"
                                        role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span
                                            class="hidden-xs-down">
                                            Documents</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal_info" role="tabpanel">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6  col-md-6 col-sm-12">
                                                <label class="form-label" for="name">Name <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter a name.." :value="{{ old('name') }}">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                {{-- <div id="edit_name_text" class="text-danger"></div> --}}
                                            </div>
                                            <div class="col-lg-6  col-md-6 col-sm-12">
                                                <label class="form-label" for="name">Name <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter a name.." :value="{{ old('name') }}">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                {{-- <div id="edit_name_text" class="text-danger"></div> --}}
                                            </div>
                                            <div class="col-lg-6  col-md-6 col-sm-12">
                                                <label class="form-label" for="name">Name <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter a name.." :value="{{ old('name') }}">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                {{-- <div id="edit_name_text" class="text-danger"></div> --}}
                                            </div>
                                            <div class="col-lg-6  col-md-6 col-sm-12">
                                                <label class="form-label" for="name">Name <span
                                                        class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter a name.." :value="{{ old('name') }}">
                                                @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                {{-- <div id="edit_name_text" class="text-danger"></div> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane  p-20" id="professional_exp" role="tabpanel">2</div>
                                <div class="tab-pane p-20" id="language_test" role="tabpanel">3</div>
                                <div class="tab-pane p-20" id="documents" role="tabpanel">3</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
@section('scripts')

@endsection
