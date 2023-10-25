@extends('layouts.admin')
@section('title', 'Edit Contact Us')
@section('links')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/node_modules/summernote/dist/summernote-bs4.css') }}">

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Contact Us</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Contact Us </h4>
                        <form action="{{ route('admin.settings.contact.update', $data->id) }}" method="POST"
                            id="privacy_form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <label class="form-label" for="duration">contact us
                                </label>
                                <textarea name="contact_us" class="summernote" id="summernote">{{ $data->contact_us }}</textarea>
                                @error('contact_us')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Mobile
                                    </label>
                                    <input type="text" class="form-control" id="mobile_1" name="mobile_1"
                                        placeholder="Enter a mobile_1" value="{{ $data->mobile_1 }}" required>
                                    @error('mobile_1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Email
                                    </label>
                                    <input type="text" class="form-control" id="mobile_2" name="mobile_2"
                                        placeholder="Enter a mobile_2" value="{{ $data->mobile_2 }}" required>
                                    @error('mobile_2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">address
                                    </label>
                                    <textarea name="address" class="form-control    " id="" cols="30" rows="2">{{ $data->address }}</textarea>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">introduction
                                    </label>
                                    <textarea name="introduction" class="form-control    " id="" cols="30" rows="2">{{ $data->introduction }}</textarea>
                                    @error('introduction')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Copy Right
                                    </label>
                                    <input type="text" class="form-control" id="copy_right" name="copy_right"
                                        placeholder="Enter a copy_right" value="{{ $data->copy_right }}" required>
                                    @error('copy_right')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Facebook Link
                                    </label>
                                    <input type="text" class="form-control" id="facebook_link" name="facebook_link"
                                        placeholder="Enter a facebook_link" value="{{ $data->facebook_link }}">
                                    @error('facebook_link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Twitter Link
                                    </label>
                                    <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                                        placeholder="Enter a twitter_link" value="{{ $data->twitter_link }}">
                                    @error('twitter_link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">LinkedIn Link
                                    </label>
                                    <input type="text" class="form-control" id="linkedin_link" name="linkedin_link"
                                        placeholder="Enter a linkedin_link" value="{{ $data->linkedin_link }}">
                                    @error('linkedin_link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                    Contact Us</button>
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
    <script src="{{ asset('admin/assets/node_modules/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {

            $('.summernote').summernote({
                height: 350, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote
            });

            $('.inline-editor').summernote({
                airMode: true
            });

        });

        window.edit = function() {
                $(".click2edit").summernote()
            },
            window.save = function() {
                $(".click2edit").summernote('destroy');
            }
    </script>
@endsection
