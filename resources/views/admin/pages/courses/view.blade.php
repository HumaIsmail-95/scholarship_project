@extends('layouts.admin')
@section('title', 'View Course')
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
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                                class="fa fa-list"></i>
                            Course List</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View Course </h4>
                        <form action="{{ route('admin.courses.update', $uni_course->id) }}" method="POST" id="course_form"
                            enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                @method('PUT')
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="name">Course Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter a name.." value="{{ $uni_course->name }}" required>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">University <span class="text-danger">*</span>
                                    </label>
                                    <select class="js-data-example-ajax form-select" id='uni_id' name='uni_id' required>
                                        <option value="{{ $uni_course->uni_id }}">{{ $uni_course->university->name }}
                                        </option>
                                    </select>

                                    @error('uni_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Country<span class="text-danger">*</span>
                                    </label>
                                    <select name="country_id" class="form-select" id=""
                                        :value="{{ old('country_id') }}" required>
                                        <option value="{{ $uni_course->country->id }}">
                                            {{ $uni_course->country->name }}
                                        </option>
                                    </select>
                                    @error('country_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">City <span class="text-danger">*</span>
                                    </label>
                                    <select class="js-data-example-ajax form-select" id='city_id' name='city_id' required>
                                        <option value="{{ $uni_course->city->id }}">{{ $uni_course->city->cityName }}
                                        </option>

                                    </select>

                                    @error('country')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Course Duration (in semester) <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control" id="duration" name="duration"
                                        placeholder="Enter a duration.." value="{{ $uni_course->duration }}" required>
                                    @error('duration')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Degree<span class="text-danger">*</span>
                                    </label>
                                    <select name="degree_id" class="form-select" id="degree_id"
                                        :value="{{ old('degree_id') }}" required>
                                        <option value="{{ $uni_course->degree->id }}">{{ $uni_course->degree->name }}
                                        </option>
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
                                        placeholder="Enter a tuition fee.." value="{{ $uni_course->tuition_fee }}" required
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
                                        <option value="1" @if ($uni_course->tuition_fee_type == 1) selected @endif>Per Year
                                        </option>
                                        <option value="2" @if ($uni_course->tuition_fee_type == 2) selected @endif>Per
                                            Semester</option>
                                        <option value="3" @if ($uni_course->tuition_fee_type == 3) selected @endif>Per Month
                                        </option>
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
                                        <option value="{{ $uni_course->studyModel->id }}">
                                            {{ $uni_course->studyModel->name }}
                                        </option>
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
                                        <option value="{{ $uni_course->degree->discipline->id }}">
                                            {{ $uni_course->degree->discipline->name }}
                                        </option>
                                    </select>
                                    @error('discipline_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Season<span class="text-danger">*</span>
                                    </label>
                                    <select name="season" class="form-select" id="season"
                                        :value="{{ old('season') }}" required>
                                        <option value="">Seelct season</option>
                                        <option value="Spring" @if ($uni_course->season == 'Spring') selected @endif>Spring
                                        </option>
                                        <option value="Summer" @if ($uni_course->season == 'Summer') selected @endif>Summer
                                        </option>
                                        <option value="Autumn" @if ($uni_course->season == 'Autumn') selected @endif>Autumn
                                        </option>
                                        <option value="Winter" @if ($uni_course->season == 'Winter') selected @endif>Winter
                                        </option>
                                    </select>
                                    @error('season')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6  col-sm-12 my-2">
                                    <label class="form-label" for="name">Start Month<span
                                            class="text-danger">*</span>
                                    </label>
                                    <select name="start_month" class="form-select" id="start_month"
                                        :value="{{ old('Start Month') }}" required>
                                        <option value="">Seelct Start Month</option>
                                        <option value="January" @if ($uni_course->start_month == 'January') selected @endif>January
                                        </option>
                                        <option value="Febuary" @if ($uni_course->start_month == 'Febuary') selected @endif>Febuary
                                        </option>
                                        <option value="March" @if ($uni_course->start_month == 'March') selected @endif>March
                                        </option>
                                        <option value="April" @if ($uni_course->start_month == 'April') selected @endif>April
                                        </option>
                                        <option value="May" @if ($uni_course->start_month == 'May') selected @endif>May
                                        </option>
                                        <option value="June" @if ($uni_course->start_month == 'June') selected @endif>June
                                        </option>
                                        <option value="July" @if ($uni_course->start_month == 'July') selected @endif>July
                                        </option>
                                        <option value="August" @if ($uni_course->start_month == 'August') selected @endif>August
                                        </option>
                                        <option value="September" @if ($uni_course->start_month == 'September') selected @endif>
                                            September</option>
                                        <option value="Octouber" @if ($uni_course->start_month == 'Octouber') selected @endif>
                                            Octouber</option>
                                        <option value="November" @if ($uni_course->start_month == 'November') selected @endif>
                                            November</option>
                                        <option value="December" @if ($uni_course->start_month == 'December') selected @endif>
                                            December</option>
                                    </select>
                                    @error('start_month')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                    <label for="">Description</label>
                                    <input type="hidden" id="description" name="description">

                                    <div id="editor">
                                        {!! $uni_course->description !!}

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
                            <div class="row">
                                <div class="col-lg-12 col md 12 col-sm-12">
                                    <h4 class="card-title">View Course Requirements </h4>

                                </div>

                                @foreach ($uni_course->requirements as $key => $requirement)
                                    <div class="row" id="row">
                                        <div class="col-lg-3  col-md-6 col-sm-12">
                                            <label class="form-label" for="name">Test Name <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="test_name" name="test_name[]"
                                                placeholder="Enter a name.." value="{{ $requirement->test_name }}"
                                                required>
                                            @error('test_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-3  col-md-6 col-sm-12">
                                            <label class="form-label" for="name">Min score <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="number" class="form-control" id="min_score" name="min_score[]"
                                                placeholder="Enter a min score" value="{{ $requirement->min_score }}"
                                                required>
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
                                                value="{{ $requirement->min_score_level }}" required>
                                            @error('min_score_level')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                            <div id="newinput"></div>
                            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                <label for="">Requirement Details</label>
                                <input type="hidden" id="requirement_details" name="requirement_details">

                                <div id="requirement_editor">

                                    {!! $uni_course->requirement_details !!}
                                </div>
                                @error('requirement_details')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                <label for="">Other Details</label>
                                <input type="hidden" id="other_requirements" name="other_requirements">

                                <div id="other_detail_editor">
                                    {!! $uni_course->other_requirements !!}


                                </div>
                                @error('other_requirements')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">


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
