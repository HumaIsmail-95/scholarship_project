@extends('layouts.admin')
@section('title', 'User Edit')
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
                    @can('list-user')
                        <a type="button" href={{ route('admin.users.index') }}
                            class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-list"></i>
                            User List</a>
                    @endcan

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Edit</h4>
                        <form class="form-valide" id="edit-user-form_1"
                            action="{{ route('admin.users.update', $user->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="-1" id="user_id">
                            <input type="hidden" value="PUT" name="_method">
                            <div class="form-validation">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="form-label" for="name">Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="name form-control" id="edit_name" name="name"
                                            placeholder="Enter a name.." value="{{ $user->name }}">
                                        <div id="edit_name_text" class="text-danger errors"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="name">Email <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="name form-control" id="edit_email" name="email"
                                            placeholder="Enter a email.." value="{{ $user->email }}">
                                        <div id="edit_email_text" class="text-danger errors"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="name">Password <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="name form-control" id="edit_password" name="password"
                                            placeholder="Enter a password.." value="{{ $user->password }}">
                                        <div id="edit_password_text" class="text-danger errors"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="name">Confirm Password <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="password" class="name form-control" id="edit_password_confirmation"
                                            name="password_confirmation" placeholder="Enter a confirm_password.."
                                            :value="old('password_confirmation')">
                                        <div id="edit_password_confirmation_text" class="text-danger errors"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="name">Type <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-select" name="type" id="edit_type">
                                            <option value="">Select Type</option>
                                            <option value="admin" @if ($user->type == 'admin') selected @endif>Admin
                                            </option>
                                            <option value="student" @if ($user->type == 'student') selected @endif>
                                                Student</option>
                                        </select>

                                        <div id="edit_type_text" class="text-danger errors"></div>
                                    </div>
                                    <div class="col-md-12">
                                        @foreach ($roles as $role)
                                            <div class="d-flex flex-col">
                                                <label class="inline-flex items-center mt-3">
                                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600"
                                                        name="roles[]" value="{{ $role->id }}"
                                                        @if (count($user->roles->where('id', $role->id))) checked @endif /><span
                                                        class="ml-2 text-gray-700">{{ $role->name }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit
                            User</button>
                    </div>
                    </form>

                </div>
                {{-- <div class="pagination justify-content-center">
                        {{ $users->links() }}
                    </div> --}}
            </div>
        </div>
    </div>

    </div>
@endsection
@section('scripts')
    {{-- <script src="{{ asset('admin/dist/js/pages/jasny-bootstrap.js') }}"></script> --}}
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
