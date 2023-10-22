@extends('layouts.admin')
@section('title', 'Users')
@section('links')
    {{-- <link href="{{ asset('admin/dist/css/pages/floating-label.css') }}" rel="stylesheet"> --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Users</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <form class="floating-labels" id="user-form" method="post"
                            action="{{ route('admin.profileUpdate', Auth::user()->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="name" name="name"
                                        placeholder="Enter a name.." value="{{ Auth::user()->name }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="name_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="email" name="email"
                                        placeholder="Enter a email.." value="{{ Auth::user()->email }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="email_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Password <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="password" name="password"
                                        placeholder="Enter a password..">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="password_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="name">New Password <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="new_password" name="new_password"
                                        placeholder="Enter a new password..">
                                    @error('new_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="password_text" class="text-danger errors"></div>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Confirm Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Enter a confirm_password..">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div id="password_confirmation_text" class="text-danger errors"></div>
                                </div>
                            </div>

                            <button type="submit" id="button-save"
                                class="btn btn-danger waves-effect waves-light text-white">Edit
                                Profile</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>
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
