@extends('layouts.admin')
@section('title', 'Banners and Logo')
@section('links')
    <link rel="stylesheet" href="{{ asset('admin/assets/node_modules/dropify/dist/css/dropify.min.css') }}">
@endsection
@section('content')
    @php
        $home;
        $all_courses;
        $privacy;
        $about;
        $programs;
        $blogs;
        $universities;
        $footer;
        $logo;
        foreach ($banners as $type => $banner) {
            if ($type == 'home') {
                $home = $banner;
            } elseif ($type == 'privacy') {
                $privacy = $banner;
            } elseif ($type == 'about') {
                $about = $banner;
            } elseif ($type == 'all_courses') {
                $all_courses = $banner;
            } elseif ($type == 'programs') {
                $programs = $banner;
            } elseif ($type == 'blogs') {
                $blogs = $banner;
            } elseif ($type == 'universities') {
                $universities = $banner;
            } elseif ($type == 'footer') {
                $footer = $banner;
            } elseif ($type == 'logo') {
                $logo = $banner;
            }
        }

    @endphp
    <script>
        function replaceImage(element, type) {
            imageElement = document.getElementById(type + 'Image_' + element.id)
            console.log(element);
            if (element.image_url == "" || element.image_url ==
                "http://127.0.0.1:8000/public/website/assets/images/banner/b-1.jpg") {
                imageElement.src = "{{ asset('admin/images/placeholder.jpg') }}";

            }
        }
    </script>
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Banners and Logo</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Banners and Logo</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- logo --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Logo </h4>
                        <form action="{{ route('admin.banners.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <h4 class="card-title">Logo</h4>
                                    <input type="hidden" name="type" value="logo">
                                    <label for="Logo" class="form-label">Set logo for the website</label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($logo[0]->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        <img src="{{ $logo[0]->image_url }}"
                                            onerror="replaceImage({{ $logo[0] }},'logo')"
                                            id="logoImage_{{ $logo[0]->id }}" width="150" height="150" alt="">
                                    @endif
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        Logo</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- slider home --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Home Slider Images </h4>
                        <form action="{{ route('admin.banners.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    {{-- <h4 class="card-title">Logo</h4> --}}
                                    <input type="hidden" name="type" value="home">
                                    <label for="Logo" class="form-label">Home Slider (3)</label>
                                    <input type="file" id="image" name="image[]" class="dropify"
                                        value="{{ old('image') }}" multiple />
                                    @error('image.*')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($logo[0]->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        @foreach ($home as $item)
                                            <img src="{{ $item->image_url }}"
                                                onerror="replaceImage({{ $item }},'home')"
                                                id="homeImage_{{ $item->id }}" width="150" height="150"
                                                alt="">
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        Slider </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- courses --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Courses </h4>
                        <form action="{{ route('admin.banners.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <h4 class="card-title">All courses page banner</h4>
                                    <input type="hidden" name="type" value="all_courses">
                                    <label for="Logo" class="form-label">Set banner for the courses page</label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($all_courses[0]->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        <img src="{{ $all_courses[0]->image_url }}"
                                            onerror="replaceImage({{ $all_courses[0] }},'course')"
                                            id="courseImage_{{ $all_courses[0]->id }}" width="150" height="150"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        Courses Banner</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- privacy --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Privacy </h4>
                        <form action="{{ route('admin.banners.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <h4 class="card-title">all privacy page banner</h4>
                                    <input type="hidden" name="type" value="privacy">
                                    <label for="Logo" class="form-label">Set banner for the privacy page</label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($privacy[0]->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        <img src="{{ $privacy[0]->image_url }}"
                                            onerror="replaceImage({{ $privacy[0] }},'privacy')"
                                            id="privacyImage_{{ $privacy[0]->id }}" width="150" height="150"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        Privacy Banner</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- about --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All About </h4>
                        <form action="{{ route('admin.banners.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <h4 class="card-title">all about page banner</h4>
                                    <input type="hidden" name="type" value="about">
                                    <label for="Logo" class="form-label">Set banner for the about page</label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($about[0]->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        <img src="{{ $about[0]->image_url }}"
                                            onerror="replaceImage({{ $about[0] }},'about')"
                                            id="aboutImage_{{ $about[0]->id }}" width="150" height="150"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        About Banner</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- programs  --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Programs </h4>
                        <form action="{{ route('admin.banners.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <h4 class="card-title">all programs page banner</h4>
                                    <input type="hidden" name="type" value="programs">
                                    <label for="Logo" class="form-label">Set banner for the programs page</label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($programs[0]->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        <img src="{{ $programs[0]->image_url }}"
                                            onerror="replaceImage({{ $programs[0] }},'programs')"
                                            id="programsImage_{{ $programs[0]->id }}" width="150" height="150"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        Programs Banner</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- blogs  --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Blogs </h4>
                        <form action="{{ route('admin.banners.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <h4 class="card-title">all blogs page banner</h4>
                                    <input type="hidden" name="type" value="blogs">
                                    <label for="Logo" class="form-label">Set banner for the blogs page</label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($blogs[0]->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        <img src="{{ $blogs[0]->image_url }}"
                                            onerror="replaceImage({{ $blogs[0] }},'blogs')"
                                            id="blogsImage_{{ $blogs[0]->id }}" width="150" height="150"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        Blogs Banner</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- universities  --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Universities </h4>
                        <form action="{{ route('admin.banners.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <h4 class="card-title">all universities page banner</h4>
                                    <input type="hidden" name="type" value="universities">
                                    <label for="Logo" class="form-label">Set banner for the universities page</label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($universities[0]->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        <img src="{{ $universities[0]->image_url }}"
                                            onerror="replaceImage({{ $universities[0] }},'universities')"
                                            id="universitiesImage_{{ $universities[0]->id }}" width="150"
                                            height="150" alt="">
                                    @endif
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        Universities Banner</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- footer  --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Footer </h4>
                        <form action="{{ route('admin.banners.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12  col-sm-12">
                                    <h4 class="card-title">all footer page banner</h4>
                                    <input type="hidden" name="type" value="footer">
                                    <label for="Logo" class="form-label">Set banner for the footer page</label>
                                    <input type="file" id="image" name="image" class="dropify"
                                        value="{{ old('image') }}" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if (isset($footer[0]->image_url))
                                        <label for="Logo" class="form-label">Selected image</label>
                                        <img src="{{ $footer[0]->image_url }}"
                                            onerror="replaceImage({{ $footer[0] }},'footer')"
                                            id="footerImage_{{ $footer[0]->id }}" width="150" height="150"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-12 text-right mt-2">
                                    <button type="submit" class="btn btn-info waves-effect waves-light text-white">Edit
                                        Footer Banner</button>
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

@endsection
