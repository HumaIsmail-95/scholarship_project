@extends('layouts.admin')
@section('title', 'Permission Roles')
@section('links')
    {{-- <link href="{{ asset('admin/dist/css/pages/floating-label.css') }}" rel="stylesheet"> --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Attach Role</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.permissions.index') }}">Permisisons</a></li>
                        <li class="breadcrumb-item active">Permission Roles</li>
                    </ol>
                    {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" alt="default"
                        data-bs-toggle="modal" data-bs-target="#addRoleModal"><i class="fa fa-plus-circle"></i> Create
                        Role</button> --}}
                    @can('list-permission')
                        <a href="{{ route('admin.permissions.index') }}"
                            class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class=" fas fa-clipboard-list"></i> list
                            Permissions</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Attach Role</h4>
                        <form action="{{ route('admin.permission.roles', $permission->id) }}" method="post">
                            @csrf
                            <select class="form-select" name="role" aria-label="Default select example">
                                <option value="" selected>Select role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            <div class="my-3">
                                <button type="submit" class="btn btn-success waves-effect">Attach Role</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Permission Role List ({{ $permission->name }})</h4>
                        {{-- <h6 class="card-subtitle mb-3">Simple table example</h6> --}}
                        <div class="table-responsive">
                            <table data-bs-toggle="table" data-height="250" data-mobile-responsive="true"
                                class="table table-striped">
                                <tbody id="table_id">
                                    @if ($permission->roles)
                                        @foreach ($permission_roles as $permission_role)
                                            <tr id='row_{{ $permission_role->id }}' class="tr-class-1">
                                                <td id="td-id-1" class="td-class-1"> {{ $permission_role->name }} </td>
                                                <td id="td-id-1" class="td-class-1">
                                                    @can('revoke-role')
                                                        <button type="button"
                                                            class="btn btn-danger d-none d-lg-block m-l-15 text-white"
                                                            alt="default" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"><i class="fa fa-minus-circle"></i>
                                                            Revoke Role</button>
                                                    @endcan
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <input type="hidden" value="-1" id="deleteID">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Revoke Role
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-hidden="true"></button>

                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to REvoke this Role?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <form
                                                                action="{{ route('admin.permission.revoke.role', [$permission->id, $permission_role->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger waves-effect waves-light text-white">Yes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>

                        <div class="pagination justify-content-center">
                            {{ $permission_roles->links() }}
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>



@endsection
@section('scripts')
@endsection
