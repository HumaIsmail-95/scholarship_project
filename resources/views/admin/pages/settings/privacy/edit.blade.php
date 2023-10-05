@extends('layouts.admin')
@section('title', 'Edit Privacy Policy')
@section('links')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/node_modules/summernote/dist/summernote-bs4.css') }}">

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Privacy Policy</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Privacy Policy</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Privacy Policy </h4>
                        <form action="{{ route('admin.settings.privacy.update', $data->id) }}" method="POST"
                            id="privacy_form">
                            <div class="row">
                                @csrf
                                @method('PUT')
                                <textarea name="privacy_policy" class="summernote" id="summernote">{{ $data->privacy_policy }}</textarea>
                                @error('privacy_policy')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                    Privacy Policy</button>
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
