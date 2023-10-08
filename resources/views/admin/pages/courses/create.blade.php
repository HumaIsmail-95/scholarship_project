@extends('layouts.admin')
@section('title', 'Add Course')
@section('links')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Course</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Course</li>
                    </ol>
                    @can('list-course')
                        <a type="button" href="{{ route('admin.courses.index') }}"
                            class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-list"></i>
                            Course List</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Course </h4>
                        <form action="{{ route('admin.courses.store') }}" method="POST" id="course_form"
                            enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Course Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter a name.." :value="{{ old('name') }}" required>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">University <span class="text-danger">*</span>
                                    </label>
                                    <select class="js-data-example-ajax form-select" id='uni_id' name='uni_id' required>
                                    </select>

                                    @error('uni_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Country<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="country_id" name="country_id"
                                        placeholder="Enter a country.." value="China" readonly>
                                    {{-- <select name="country_id" class="form-select" id=""
                                        :value="{{ old('country_id') }}" required>
                                        <option value="">Seelct Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select> --}}
                                    @error('country_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">City <span class="text-danger">*</span>
                                    </label>
                                    <select class="js-data-example-ajax form-select" id='city_id' name='city_id' required>
                                        <option value="">Seelct Country</option>

                                    </select>

                                    @error('city_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Course Duration (in semester) <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="duration" name="duration"
                                        placeholder="Enter a duration.." :value="{{ old('duration') }}" required>
                                    @error('duration')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Degree<span class="text-danger">*</span>
                                    </label>
                                    <select name="degree_id" class="form-select" id="degree_id"
                                        :value="{{ old('degree_id') }}" required>
                                        <option value="">Seelct degree</option>
                                        @foreach ($degrees as $degree)
                                            <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('degree_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Tuition Fee ($)<span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="tuition_fee" name="tuition_fee"
                                        placeholder="Enter a tuition fee.." :value="{{ old('tuition_fee') }}" required
                                        step=".01">
                                    @error('tuition_fee')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Tuition Fee Type<span
                                            class="text-danger">*</span>
                                    </label>
                                    <select name="tuition_fee_type" class="form-select" id="tuition_fee_type"
                                        :value="{{ old('tuition_fee_type') }}" required>
                                        <option value="">Seelct Type</option>
                                        <option value="1">Per Year</option>
                                        <option value="2">Per Semester</option>
                                        <option value="3">Per Month</option>
                                    </select>
                                    @error('tuition_fee_type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Study Model<span
                                            class="text-danger">*</span>
                                    </label>
                                    <select name="study_model_id" class="form-select" id="study_model_id"
                                        :value="{{ old('study_model_id') }}" required>
                                        <option value="">Seelct Country</option>
                                        @foreach ($studyModels as $studyModel)
                                            <option value="{{ $studyModel->id }}">{{ $studyModel->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('study_model_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Discipline<span class="text-danger">*</span>
                                    </label>
                                    <select name="discipline_id" class="form-select" id="discipline_id"
                                        :value="{{ old('discipline_id') }}" required>
                                        <option value="">Seelct Country</option>
                                        @foreach ($disciplines as $discipline)
                                            <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('discipline_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Summer starts in<span
                                            class="text-danger">*</span>
                                    </label>
                                    <select name="season" class="form-select" id="season"
                                        :value="{{ old('season') }}" required>
                                        <option value="">Select Start Month</option>
                                        <option value="January">January</option>
                                        <option value="Febuary">Febuary</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="Octouber">Octouber</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    @error('season')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Falls Start Month<span
                                            class="text-danger">*</span>
                                    </label>
                                    <select name="start_month" class="form-select" id="start_month"
                                        :value="{{ old('Start Month') }}">
                                        <option value="">Seelct Start Month</option>
                                        <option value="January">January</option>
                                        <option value="Febuary">Febuary</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="Octouber">Octouber</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    @error('start_month')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                    <label for="">Description</label>
                                    <input type="hidden" id="description" name="description">

                                    <div id="editor">


                                    </div>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <br />
                            <br />
                            <br />
                            <br />
                            <div class="row" id="row">
                                <div class="col-lg-12 col md 12 col-sm-12">
                                    <h4 class="card-title">Add Course Requirements </h4>

                                </div>
                                <div class="col-lg-3  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Test Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="test_name" name="test_name[]"
                                        placeholder="Enter a name.." :value="{{ old('test_name') }}" required>
                                    @error('test_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-3  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Min score <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="min_score" name="min_score[]"
                                        placeholder="Enter a min score" :value="{{ old('min_score') }}" required>
                                    @error('min_score')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-3  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Minimun Score Level <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="min_score_level"
                                        name="min_score_level[]" placeholder="Enter a min score level"
                                        :value="{{ old('min_score_level') }}" required>
                                    @error('min_score_level')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12   d-flex align-items-end">
                                    <button id="rowAdder" type="button" class="btn btn-dark mb-0">
                                        <span class="bi bi-plus-square-dotted">
                                        </span> ADD
                                    </button>
                                </div>
                            </div>

                            <div id="newinput"></div>
                            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                <label for="">Requirement Details</label>
                                <input type="hidden" id="requirement_details" name="requirement_details">

                                <div id="requirement_editor">


                                </div>
                                @error('requirement_details')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                <label for="">Other Details</label>
                                <input type="hidden" id="other_requirements" name="other_requirements">

                                <div id="other_detail_editor">


                                </div>
                                @error('other_requirements')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">

                                <div class="col-12 text-right mt-3 position relative">
                                    <button type="submit"
                                        class="btn btn-info waves-effect waves-light text-white position-absolute mt-5"
                                        style="bottom:0;">Add
                                        Course</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    {{-- <div class="pagination justify-content-center">
                        {{ $studyModels->links() }}
                    </div> --}}
                </div>
            </div>
        </div>

    </div>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        let addRow = 0

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
        $(document).ready(function() {
            // $("#add-fields").click(function() {
            //     var newFields = $(".field-wrapper:hidden").clone();
            //     newFields.find("select[name='other_workflow[]']").attr('name', 'other_workflow[]').val("");
            //     newFields.find("select[name='other_status[]']").attr('name', 'other_status[]').val(
            //         ""); // Set select name and reset value
            //     newFields.find("select[name='other_response_workflow[]']").attr('name',
            //         'other_response_workflow[]').val(""); // Set select name and reset value
            //     newFields.insertBefore($(this));
            //     newFields.slideDown();
            // });

            // $("#remove-fields").click(function() {
            //     $(".field-wrapper:visible").slideUp(function() {
            //         $(this).remove();
            //     });
            // });
        });
        $("#rowAdder").click(function() {
            addRow += 1
            newRowAdd =
                `<div class="row mt-3" id="row">
                                <div class="col-lg-3  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Test Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="test_name_${addRow}" name="test_name[]"
                                        placeholder="Enter a name.." :value="{{ old('test_name') }}" required>
                                    @error('test_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-3  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Min score <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="min_score_${addRow}" name="min_score[]"
                                        placeholder="Enter a min score" :value="{{ old('min_score') }}" required>
                                    @error('min_score')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-3  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Minimun Score Level <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="min_score_level_${addRow}"
                                        name="min_score_level[]" placeholder="Enter a min score level.."
                                        :value="{{ old('min_score_level') }}" required>
                                    @error('min_score_level')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-2 col-sm-6  d-flex align-items-end">
                                    <button class="btn btn-danger" id="DeleteRow" type="button">
                                        <i class="bi bi-trash"></i> Delete</button>
                                </div>`

            '</div>';


            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function() {

            $(this).parents("#row").remove();
        })
    </script>
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var quill = new Quill('#requirement_editor', {
            theme: 'snow'
        });
        var quill = new Quill('#other_detail_editor', {
            theme: 'snow'
        });
        var form = document.getElementById('course_form');

        form.addEventListener('submit', function() {
            var quillEditor = document.getElementById('editor');
            var hiddenInput = document.getElementById('description');
            hiddenInput.value = quillEditor.innerHTML;


            var requiremtnEditor = document.getElementById('requirement_editor');
            var requirement_details = document.getElementById('requirement_details');
            requirement_details.value = requiremtnEditor.innerHTML;

            var otherDetailEditor = document.getElementById('other_detail_editor');
            var other_requirements = document.getElementById('other_requirements');
            other_requirements.value = otherDetailEditor.innerHTML;
        });
    </script>
@endsection
