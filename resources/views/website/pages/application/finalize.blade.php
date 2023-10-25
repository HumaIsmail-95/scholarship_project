@extends('layouts.userPanel')
@section('links')
    <link rel="stylesheet" href="{{ asset('admin/assets/node_modules/dropify/dist/css/dropify.min.css') }}">

@endsection
@section('title', 'Finalizing Application')
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
                <h4 class="text-themecolor">Finalizing Your Application</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Finalizing Your Application</li>
                    </ol>
                </div>
            </div>
        </div>
        <form action="{{ route('submiteApplication', $program->id) }}" id="myForm" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-check">
                                <label>
                                    <input type="radio" name="intake" value="{{ date('Y') . ' Summer' }}" checked>
                                    Summer {{ date('Y') }}
                                </label>
                                <label>
                                    <input type="radio" name="intake" value="{{ date('Y') . ' Winter' }}">
                                    Winter {{ date('Y') }}
                                </label>
                                <label>
                                    <input type="radio" name="intake" value="{{ date('Y') . ' Summer' }}">
                                    Summer {{ date('Y') + 1 }}
                                </label>
                                <label>
                                    <input type="radio" name="intake" value="{{ date('Y') . ' Winter' }}">
                                    Winter {{ date('Y') + 1 }}
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row border m-1">
                                {{-- <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                    <input type="hidden" name="course_id" value="{{ $program->id }}" id="course_id">
                                    <label for="">Location</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Enter a city.."
                                        value="{{ $program->city->name . ', ' . $program->country->name }}" readonly>
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="course_id_text" class="text-danger"></div>
                                </div> --}}
                                <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                    <label for="">Who sponsor your studies</label>
                                    <input type="text" class="form-control" id="sponsor" name="sponsor"
                                        placeholder="Enter a Sponsor..">
                                    @error('sponsor')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="sponsor_text" class="text-danger"></div>
                                </div>
                                <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                    <label for="">What is the sponsor's occupation?</label>
                                    <input type="text" class="form-control" id="occupation" name="occupation"
                                        placeholder="Enter a occupation..">
                                    @error('occupation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="occupation_text" class="text-danger"></div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 my-2">
                                    <label for="">Applying for Visa from your country?</label>
                                    <div class="form-check">
                                        <label>
                                            <input type="radio" name="visa" value="1" checked>
                                            Yes
                                        </label>
                                        <label>
                                            <input type="radio" name="visa" value="0">
                                            No
                                        </label>

                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12  col-sm-12 my-2">
                                    {{-- <h4 class="card-title">Attach Document</h4> --}}
                                    <label for="document" class="form-label">Statement of purpose </label>
                                    <input type="file" id="doc" name="doc" class="dropify"
                                        :value="{{ old('doc') }}" />
                                    @error('doc')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="doc_text" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="row border m-1">
                                <div class="col-lg-12  col-md-12 col-sm-12 my-2">
                                    <label class="form-label" for="name">Notes <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control" name="notes" id="" cols="30" rows="10"></textarea>
                                    @error('notes')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="notes_text" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="btn_submit" onclick="onSubmit()"
                        class="btn btn-info waves-effect waves-light text-white">Submit
                        Application</button>
                </div>
            </div>
        </form>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
@section('scripts')
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
        function onSubmit() {
            $("#btn_submit").prop("disabled", true);
            $("#btn_submit").text("Loading");
            const form = document.getElementById('myForm');
            form.submit();
        }

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
