@extends('layouts.userPanel')
@section('links')
@endsection
@section('title', 'Review Application')
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
                <h4 class="text-themecolor">Review Application</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Review Application</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Final Step toward your dream degree, Review your application</h4>
                        {{-- <h6 class="card-subtitle">Use default tab with class <code>vtabs, tabs-vertical & customvtab</code> --}}
                        </h6>
                        <!-- Nav tabs -->
                        <div class="mb-2">
                            <h6 class="text-primary">Institution Name:</h6>
                            <h6 class="text-dark"><b>{{ $program->university->name }}</b></h6>
                        </div>
                        <div class="mb-2">
                            <h6 class="text-primary">Course Name:</h6>
                            <h6 class="text-dark"><b>{{ $program->name }}</b></h6>
                        </div>

                        <div>
                            <h6 class="text-primary">Degree Name:</h6>
                            <h6 class="text-dark">{{ $program->degree->name }}</h6>
                        </div>
                        <div>
                            <h6 class="text-primary">Duration:</h6>
                            <h6 class="text-dark">{{ $program->duration }} Semester</h6>
                        </div>
                        <div>
                            @php
                                $tuitionFee = 'Yearly';
                                if ($program->tuition_fee_type == 2) {
                                    $tuitionFee = 'per Semester';
                                } elseif ($program->tuition_fee_type == 3) {
                                    $tuitionFee = 'per Month';
                                }
                            @endphp

                            <h6 class="text-primary">Tuition Fee:</h6>
                            <h6 class="text-dark"><span></span>$ {{ $program->tuition_fee }}
                                ({{ $tuitionFee }})
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Review Information</h4>
                        <div>
                            <h6 class="card-title">Personal Information</h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Name</p>
                                    <p>{{ $student->name }}</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Email</p>
                                    <p>{{ $student->email }}</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Mobile</p>
                                    <p>{{ $student->mobile }}</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Address</p>
                                    <p>{{ $student->address }}</p>
                                </div>
                                @php
                                    $id_card;
                                    $travel_proof;
                                    foreach ($student->studentGalleries as $img) {
                                        if ($img->type == 'id_card') {
                                            $id_card = $img;
                                        }
                                        if ($img->type == 'travel_proof') {
                                            $travel_proof = $img;
                                        }
                                    }
                                @endphp
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Id Card Number/ Passport Number</p>
                                    <p>{{ $student->id_number }} <a class="text-success"
                                            href="{{ $id_card ? $id_card->image_url : '' }}" download>Id card /
                                            Passport</a>
                                    </p>
                                </div>
                                @if ($student->travel_history)
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <p class="text-primary mb-0">Travel History</p>
                                        <p>{{ $student->traveled_to }} <a class="text-success"
                                                href="{{ $travel_proof ? $travel_proof->image_url : '' }}" download>
                                                travel</a>
                                        </p>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title">Education Information</h6>
                            <div class="row">
                                @forelse ($education as $edu)
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <p class="text-primary mb-0">Program Name</p>
                                        <p>{{ $edu->program_name }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <p class="text-primary mb-0">Institution Name</p>
                                        <p>{{ $edu->institute_name }}</p>
                                    </div>
                                    @php
                                        $transcript;
                                        $certificate;
                                        foreach ($edu->educationGalleries as $eduImg) {
                                            if ($eduImg->type == 'transcript') {
                                                $transcript = $eduImg;
                                            }
                                            if ($eduImg->type == 'certificate') {
                                                $certificate = $eduImg;
                                            }
                                        }
                                    @endphp
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <p class="text-primary mb-0">Achievements</p>
                                        <p>{{ $edu->grade }} <a class="text-success"
                                                href="{{ $transcript ? $transcript->image_url : '' }}"
                                                download>transcript</a>
                                            <a class="text-success"
                                                href="{{ $certificate ? $certificate->image_url : '' }}"
                                                download>certificate</a>
                                        </p>
                                    </div>
                                @empty
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <p class="text-primary mb-0">No Education History</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title">Professional Experience </h6>
                            <div class="row">
                                @forelse ($experience as $exp)
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <p class="text-primary mb-0">Exployer Name</p>
                                        <p>{{ $exp->employer_name }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <p class="text-primary mb-0">Location</p>
                                        <p>{{ $exp->location }}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <p class="text-primary mb-0">Designation</p>
                                        <p>{{ $exp->title }}
                                        </p>
                                    </div>
                                @empty
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <p class="text-primary mb-0">No Professional History</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $ielts;
            $toelf;
            $pearson;
            $moi;
            foreach ($testLanguage->testGalleries as $testImg) {
                if ($testImg->type == 'ielts') {
                    $ielts = $testImg;
                } elseif ($testImg->type == 'toelf') {
                    $toelf = $testImg;
                } elseif ($testImg->type == 'pearson') {
                    $pearson = $testImg;
                } elseif ($testImg->type == 'moi') {
                    $moi = $testImg;
                }
            }
        @endphp
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title">Language and Tests </h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Native English Speaker</p>
                                    <p>{{ $testLanguage->native_english ? 'Yes' : 'No' }}</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">IELTS</p>
                                    <p>{{ $testLanguage->ielts_score }}
                                        <a class="text-success" href="{{ $ielts ? $ielts->image_url : '' }}" download>
                                            IELTS
                                            doc</a>
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">TOELF </p>
                                    <p>{{ $testLanguage->toelf_score }}
                                        <a class="text-success" href="{{ $toelf ? $toelf->image_url : '' }}" download>
                                            TOELF
                                            doc</a>
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">PEARSON</p>
                                    <p>{{ $testLanguage->pearson_score }}
                                        <a class="text-success" href="{{ $pearson ? $pearson->image_url : '' }}"
                                            download>
                                            PEARSON doc</a>
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">MOI</p>
                                    <a class="text-success" href="{{ $moi ? $moi->image_url : '' }}" download> MOI
                                        doc</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $resume = null;
            $exp_letter = null;
            $other = null;
            $recomendation = null;
            foreach ($documents as $doc) {
                if ($doc->type == 'resume') {
                    $resume = $doc;
                } elseif ($doc->type == 'exp_letter') {
                    $exp_letter = $doc;
                } elseif ($doc->type == 'other') {
                    $other = $doc;
                } elseif ($doc->type == 'recomendation') {
                    $recomendation = $doc;
                }
            }
        @endphp
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title">Documents </h6>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Resume</p>
                                    <a class="text-success" href="{{ $resume ? $resume->image_url : '' }}" download>
                                        resume
                                        doc</a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Experience Letter </p>
                                    <a class="text-success" href="{{ $exp_letter ? $exp_letter->image_url : '' }}"
                                        download> exp letter
                                        doc</a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Other</p>
                                    <a class="text-success" href="{{ $other ? $other->image_url : '' }}" download>
                                        other doc</a>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <p class="text-primary mb-0">Recomendation</p>
                                    <a class="text-success" href="{{ $recomendation ? $recomendation->image_url : '' }}"
                                        download> recomendation
                                        doc</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('finalizeApplication', $program->id) }}" class="btn btn-success">Next</a>
            </div>
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
