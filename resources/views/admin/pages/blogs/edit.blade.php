@extends('layouts.admin')
@section('title', 'Edit Blog')
@section('links')
    <link rel="stylesheet" href="{{ asset('admin/assets/node_modules/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/node_modules/summernote/dist/summernote-bs4.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Edit Blog</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Blog</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- image --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Heading <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="heading" name="heading"
                                        placeholder="Enter a heading.." value="{{ $blog->heading }}" required>
                                    @error('heading')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6  col-md-6 col-sm-12">
                                    <label class="form-label" for="duration">Sub Heading <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="sub_heading" name="sub_heading"
                                        placeholder="Enter a sub heading.." value="{{ $blog->sub_heading }}" required>
                                    @error('sub_heading')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <h4 class="card-title">Image</h4>
                                    <label for="Logo" class="form-label">Set image for the blog</label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($blog->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        <img src="{{ $blog->image_url }}" width="150" height="150" alt="">
                                    @endif
                                </div>

                                <div class="col-12 my-2">
                                    <textarea name="description" class="summernote" id="summernote">{{ $blog->description }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        Blog</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>


    </div>
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
