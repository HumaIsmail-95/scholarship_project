@extends('layouts.userPanel')
@section('links')
    <link href="{{ asset('admin/assets/node_modules/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/pages/bootstrap-switch.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/node_modules/dropify/dist/css/dropify.min.css') }}">

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
                        <h4 class="card-title">Student Profile</h4>
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
                                    <form method="post" id="personal-info-form" onsubmit="submitPersonalInfo()"
                                        enctype="multipart/form-data" action="javascript:;">
                                        @csrf
                                        @method('POST')
                                        @if ($student == null)
                                            @include('website.pages.profile.personalCreate')
                                        @else
                                            @include('website.pages.profile.personalEdit')
                                        @endif
                                        <div class="row">
                                            <div class="col-12 text-right mt-2">
                                                <button type="submit" id="personal-button-save"
                                                    class="btn btn-info waves-effect waves-light text-white">Save &
                                                    Continue</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane  p-20" id="professional_exp" role="tabpanel">
                                    <form method="post" id="professional-exp-form" onsubmit="submitProfessionalExp()"
                                        enctype="multipart/form-data" action="javascript:;">
                                        @csrf
                                        @method('POST')
                                        @if (empty($professionalData['education'][0]))
                                            @include('website.pages.profile.professionalCreate')
                                        @else
                                            @include('website.pages.profile.professionalEdit')
                                        @endif
                                        <div class="row">
                                            <div class="col-12 text-right mt-2">
                                                <button type="submit"
                                                    class="btn btn-info waves-effect waves-light text-white">Save &
                                                    Continue</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane p-20" id="language_test" role="tabpanel">
                                    <p>Please upload your Language Certificates</p>
                                    <form action="">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="native_english">
                                                    <label class="form-check-label" for="native_english">
                                                        I am a Native English Speaker</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="row border m-1">
                                                    <h4 class="mb-0 mt-2">IELTS</h4>
                                                    <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                                        <label class="form-label" for="name">Score <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="ielts_score"
                                                            name="ielts_score" placeholder="Enter a ielts score.."
                                                            :value="{{ old('ielts_score') }}">
                                                        @error('ielts_score')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <div id="ielts_score_text" class="text-danger"></div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                                                        {{-- <h4 class="card-title">Attach Document</h4> --}}
                                                        <label for="document" class="form-label">Documents </label>
                                                        <input type="file" id="ielts" name="ielts"
                                                            class="dropify" :value="{{ old('ielts') }}" />
                                                        @error('ielts')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <div id="ielts_text" class="text-danger"></div>
                                                    </div>
                                                </div>
                                                <div class="row border m-1">
                                                    <h4 class="mb-0 mt-2">TOEFL</h4>
                                                    <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                                        <label class="form-label" for="name">Score <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="toelf_score"
                                                            name="toelf_score" placeholder="Enter a ielts score.."
                                                            :value="{{ old('toelf_score') }}">
                                                        @error('toelf_score')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <div id="toelf_score_text" class="text-danger"></div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                                                        {{-- <h4 class="card-title">Attach Document</h4> --}}
                                                        <label for="document" class="form-label">Documents </label>
                                                        <input type="file" id="toelf" name="toelf"
                                                            class="dropify" :value="{{ old('toelf') }}" />
                                                        @error('toelf')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <div id="toelf_text" class="text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="row border m-1">
                                                    <h4 class="mb-0 mt-2">Pearson (PTE)</h4>
                                                    <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                                        <label class="form-label" for="name">Score <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            id="pearson_score_score" name="pearson_score_score"
                                                            placeholder="Enter a pearson score.."
                                                            :value="{{ old('pearson_score_score') }}">
                                                        @error('pearson_score_score')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <div id="pearson_score_score_text" class="text-danger"></div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                                                        <h4 class="card-title">Attach Document</h4>
                                                        <label for="document" class="form-label">Documents </label>
                                                        <input type="file" id="pearson_score" name="pearson_score"
                                                            class="dropify" :value="{{ old('pearson_score') }}" />
                                                        @error('pearson_score')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <div id="pearson_score_text" class="text-danger"></div>
                                                    </div>
                                                </div>
                                                <div class="row border m-1">
                                                    <h4>Medium Of Instruction (MOI)</h4>
                                                    <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                                                        <p>A medium of instruction is a language used in teaching at your
                                                            University.</p>
                                                        {{-- <h4 class="card-title">Attach Document</h4> --}}
                                                        <label for="document" class="form-label">Documents </label>
                                                        <input type="file" id="moi" name="moi"
                                                            class="dropify" :value="{{ old('moi') }}" />
                                                        @error('moi')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                        <div id="moi_text" class="text-danger"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right mt-2">
                                                <button type="submit"
                                                    class="btn btn-info waves-effect waves-light text-white">Save &
                                                    Continue</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane p-20" id="documents" role="tabpanel">
                                    <div class="row">
                                        <h4 class="card-title">Attach Document</h4>
                                        <form action="">
                                            @csrf
                                            <div class="col-lg-4 col-md-6 col-sm-12 ">
                                                <div class="border m-1">
                                                    <label for="document" class="form-label mt-2">CV/Resume </label>
                                                    <input type="file" id="resume" name="resume[]" class="dropify"
                                                        :value="{{ old('resume') }}" />
                                                    @error('resume')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <div id="resume_text" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 ">
                                                <div class="border m-1">
                                                    <label for="document" class="form-label mt-2">Experience Letter
                                                    </label>
                                                    <input type="file" id="exp_letter" name="exp_letter[]"
                                                        class="dropify" :value="{{ old('exp_letter') }}" />
                                                    @error('exp_letter')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <div id="exp_letter_text" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 ">
                                                <div class="border m-1">
                                                    <label for="document" class="form-label mt-2">Recommendation Letter
                                                    </label>
                                                    <input type="file" id="recomendation" name="recomendation[]"
                                                        class="dropify" :value="{{ old('recomendation') }}" />
                                                    @error('recomendation')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <div id="recomendation_text" class="text-danger"></div>
                                                </div>

                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 ">
                                                <div class="border m-1">
                                                    <label for="document" class="form-label mt-2">Other Document </label>
                                                    <input type="file" id="other" name="other[]" class="dropify"
                                                        :value="{{ old('other') }}" />
                                                    @error('other')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <div id="other_text" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <p class="mb-0 mt-2">
                                                    In order to proceed, please now ensure you understand and accept all
                                                    applicable terms and then check the boxes below:
                                                </p>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="declaration"
                                                        checked>
                                                    <label class="form-check-label" for="declaration">I declare that the
                                                        information given in the application is true, complete and accurate
                                                        and
                                                        no data requested has been omitted.</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="accept"
                                                        checked>
                                                    <label class="form-check-label" for="accept"> I accept the terms of
                                                        this Fair Processing Notice and the UniApp Privacy Notice which
                                                        supplements it.</label>
                                                </div>
                                            </div>
                                            <div class="col-12 text-right mt-2">
                                                <button type="submit"
                                                    class="btn btn-info waves-effect waves-light text-white">Save &
                                                    Continue</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
    {{-- <script src="{{ asset('admin/assets/node_modules/horizontal-timeline/js/horizontal-timeline.js') }}"></script> --}}
    <script src="{{ asset('admin/assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
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
    {{-- add and remove new row --}}
    <script>
        let addRow = 0
        $("#rowAdder").click(function() {
            addRow += 1
            newRowAdd =
                `<div class="row border m-1 py-0"  id="row">
                    <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                        <label class="form-label" for="name">Start Date <span
                                class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="date" value=""
                            name="start[]" id="start_${addRow}">
                        @error('start')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div id="start_${addRow}_text" class="text-danger"></div>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                        <label class="form-label" for="name">End Date <span
                                class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="date" value=""
                            name="end[]" id="end_${addRow}">
                        @error('end')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div id="end_${addRow}_text" class="text-danger"></div>
                    </div>
                    <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                        <label class="form-label" for="name">Program Name <span
                                class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="program_name_${addRow}"
                            name="program_name[]" placeholder="Enter a program name.."
                            :value="{{ old('program_name') }}">
                        @error('program_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div id="program_name_${addRow}_text" class="text-danger"></div>
                    </div>
                    <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                        <label class="form-label" for="name">Institution Name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control"
                            id="institute_name_${addRow}" name="institute_name[]"
                            placeholder="Enter a Institution name.."
                            :value="{{ old('institute_name') }}">
                        @error('institute_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div id="institute_name_${addRow}_text" class="text-danger"></div>
                    </div>
                    <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                        <label class="form-label" for="name">Grade <span
                                class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="grade_${addRow}"
                            name="grade[]" placeholder="Enter a Institution name.."
                            :value="{{ old('grade') }}">
                        @error('grade')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div id="grade_${addRow}_text" class="text-danger"></div>
                    </div>
                    <div class="col-lg-12 col-md-12  col-sm-12">
                        {{-- <h4 class="card-title">Attach Document</h4> --}}
                        <label for="document" class="form-label">Transcript</label>
                        <input type="file" id="transcript_${addRow}" name="transcript[]"
                            class="dropify" :value="{{ old('transcript[]') }}" />
                        @error('transcript[]')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div id="transcript_${addRow}_text" class="text-danger"></div>
                    </div>
                    <div class="col-lg-12 col-md-12  col-sm-12">
                        {{-- <h4 class="card-title">Attach Document</h4> --}}
                        <label for="document" class="form-label">Certificate</label>
                        <input type="file" id="certificate_${addRow}" name="certificate[]"
                            class="dropify" :value="{{ old('certificate[]') }}" />
                        @error('certificate[]')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div id="certificate_${addRow}_text" class="text-danger"></div>
                    </div>
                    <div class="col-md-12 col-sm-6  d-flex justify-content-end my-2">
                        <button class="btn btn-danger" id="DeleteRow" type="button">
                            <i class="bi bi-trash"></i> Delete</button>
                    </div>
                </div>
                `
            $('#newinput').append(newRowAdd);
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
        $("body").on("click", "#DeleteRow", function() {

            $(this).parents("#row").remove();
        })

        let addRowExp = 0
        $("#rowAdder_exp").click(function() {
            addRowExp += 1
            newRowAddExp =
                `
                    <div class="row border m-1 py-2"  id="rowExp">
                        <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                            <label class="form-label" for="name">Joining Date
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" type="date" value=""
                                name="joining[]" id="joining_${addRowExp}">
                            @error('joining')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="joining_${addRowExp}_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-12 my-2">
                            <label class="form-label" for="name">End Date <span
                                    class="text-danger">*</span>
                            </label>
                            <input class="form-control" type="date" value=""
                                name="ending[]" id="ending_${addRowExp}">
                            @error('ending')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="ending_${addRowExp}_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                            <label class="form-label" for="name">Employer Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control"
                                id="employer_name_${addRowExp}" name="employer_name[]"
                                placeholder="Enter a employer name.."
                                :value="{{ old('employer_name') }}">
                            @error('employer_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="employer_name_${addRowExp}_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                            <label class="form-label" for="name">Location
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="location_${addRowExp}"
                                name="location[]"
                                placeholder="Enter a location name.."
                                :value="{{ old('location') }}">
                            @error('location')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="location_${addRowExp}_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                            <label class="form-label" for="name">Title <span
                                    class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="title_${addRowExp}"
                                name="title[]"
                                placeholder="Enter a Institution name.."
                                :value="{{ old('title') }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div id="title_${addRowExp}_text" class="text-danger"></div>
                        </div>
                        <div class="col-lg-12 col-md-12  col-sm-12">
                            {{-- <h4 class="card-title">Attach Document</h4> --}}
                            <label for="document" class="form-label">Duties</label>
                            <textarea class="form-control" name="duties[]" id="duties_${addRowExp}" cols="30" rows="10"></textarea>
                            <div id="duties_${addRowExp}_text" class="text-danger"></div>
                        </div>
                        <div class="col-md-12 col-sm-6  d-flex justify-content-end my-2">
                            <button class="btn btn-danger" id="DeleteRowExp" type="button">
                                <i class="bi bi-trash"></i> Delete</button>
                        </div>
                    </div>

            `
            $('#newinputExp').append(newRowAddExp);
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
        $("body").on("click", "#DeleteRowExp", function() {

            $(this).parents("#rowExp").remove();
        })

        function handleValidationErrors(error, type = 'create') {
            let errors = error.responseJSON.errors;
            var errorMessage = error.responseJSON.message
            var element = '';
            $.each(errors, function(key, item) {
                element = key.split('.')
                console.log(`${element[0]}_${element[1]}`);
                if (element.length > 1) {
                    element = `${element[0]}_${element[1]}`
                } else {
                    element = `${element}`
                }
                if (type == 'edit') {
                    console.log('edit', element);
                    $(`#${element}_text`).text(item[0])
                } else if (type == 'create') {
                    $(`#${element}_text`).text(item[0])
                }
            });

            return errorMessage;
        }

        function disableTravelFields() {
            var check = document.getElementById('travel_history').value;
            console.log('check', check, document.getElementById('traveled_to'));
            if (check == 0) {
                document.getElementById('traveled_to').disabled = true

                var dropifyInput = $('#travel_document');
                dropifyInput.css('pointer-events', 'none');
            } else {
                document.getElementById('traveled_to').disabled = false
                var dropifyInput = $('#travel_document');

                dropifyInput.css('pointer-events', 'auto');
            }
        }

        function submitPersonalInfo() {

            var form = $('#personal-info-form')[0];
            console.log('form ', form);
            $("#personal-button-save").text('Loading...');
            var userID = document.getElementById('user_id').value;

            const myFormData = new FormData(form);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/personal-info/" + userID, // the endpoint
                type: "POST", // http method
                processData: false,
                contentType: false,
                data: myFormData,
                beforeSend: function() {
                    $(form)
                    $('.backend-error-text').text('')
                    $("#personal-button-save").prop("disabled", true);

                },
                success: function(data) {

                    console.log('data', data);
                    $("#personal-button-save").prop("disabled", false);
                    $("#personal-button-save").text("Save & Continue");
                    var successAlert = $("#success-alert");
                    showToaster('success', 'Success', data.message);

                },
                error: function(error) {
                    $(form)
                    $("#personal-button-save").prop("disabled", false);
                    $("#personal-button-save").text("Save & Continue");
                    var errorMessage = error.statusText;
                    console.log('error validation', error);
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error)
                    }
                    showToaster('error', 'Error', errorMessage);

                },
            });
        }

        function submitProfessionalExp() {

            var form = $('#professional-exp-form')[0];
            console.log('form ', form);
            $("#personal-button-save").text('Loading...');
            var userID = document.getElementById('user_id').value;

            const myFormData = new FormData(form);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/professional-exp/" + userID, // the endpoint
                type: "POST", // http method
                processData: false,
                contentType: false,
                data: myFormData,
                beforeSend: function() {
                    $(form)
                    $('.backend-error-text').text('')
                    $("#personal-button-save").prop("disabled", true);

                },
                success: function(data) {

                    console.log('data', data);
                    $("#personal-button-save").prop("disabled", false);
                    $("#personal-button-save").text("Save & Continue");
                    var successAlert = $("#success-alert");
                    showToaster('success', 'Success', data.message);

                },
                error: function(error) {
                    $(form)
                    $("#personal-button-save").prop("disabled", false);
                    $("#personal-button-save").text("Save & Continue");
                    var errorMessage = error.statusText;
                    console.log('error validation', error);
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error)
                    }
                    showToaster('error', 'Error', errorMessage);

                },
            });
        }

        function experienceForm() {
            console.log(' i m herer');
            var exp_check = document.getElementById('experience_check')
            console.log('exp_check', exp_check);
            if (exp_check.checked) {
                document.getElementById('experience_div').style.display = 'none'
            } else {
                document.getElementById('experience_div').style.display = 'block'

            }
        }
    </script>
@endsection
