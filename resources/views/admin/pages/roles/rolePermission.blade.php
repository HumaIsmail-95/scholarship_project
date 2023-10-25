    @extends('layouts.admin')
    @section('title', 'Role Permissions')
    @section('links')
        {{-- <link href="{{ asset('admin/dist/css/pages/floating-label.css') }}" rel="stylesheet"> --}}
    @endsection
    @section('content')
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Attach Permissions</h4>
                </div>
                <div class="col-md-7 align-self-center text-end">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                            <li class="breadcrumb-item active">Role Permissions</li>
                        </ol>
                        @can('list-role')
                            <a href="{{ route('admin.roles.index') }}"
                                class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class=" fas fa-clipboard-list"></i>
                                list
                                Role</a>
                        @endcan
                        {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" alt="default"
                        data-bs-toggle="modal" data-bs-target="#addRoleModal"><i class="fa fa-plus-circle"></i> Create
                        Role</button> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Attach Permission</h4>
                            <form action="{{ route('admin.role.permissions', $role->id) }}" method="post">
                                @csrf
                                <select class="form-select" name="permission" aria-label="Default select example">
                                    <option value="" selected>Select permission</option>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                                @error('permission')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <div class="my-3">
                                    <button type="submit" class="btn btn-success waves-effect">Attach Permission</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Role Permissions List ({{ $role->name }})</h4>
                            {{-- <h6 class="card-subtitle mb-3">Simple table example</h6> --}}
                            <div class="table-responsive">
                                <table data-bs-toggle="table" data-height="250" data-mobile-responsive="true"
                                    class="table table-striped">
                                    <tbody id="table_id">
                                        @if ($role->permissions)
                                            @foreach ($role_permissions as $role_permission)
                                                <tr id='row_{{ $role_permission->id }}' class="tr-class-1">
                                                    <td id="td-id-1" class="td-class-1"> {{ $role_permission->name }}
                                                    </td>
                                                    <td id="td-id-1" class="td-class-1">
                                                        @can('revoke-permission')
                                                            <a class="btn btn-danger  text-white"
                                                                href="javascript:openDeleteDialog({{ $role->id }},{{ $role_permission->id }})">
                                                                <i class="fas fa-trash"></i> Revoke Permission</a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination justify-content-center">
                                {{ $role_permissions->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" discipline="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" discipline="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="hidden" value="-1" id="roleId">
                        <input type="hidden" value="-1" id="permissionId">
                        <h5 class="modal-title" id="exampleModalLongTitle">Revoke
                            Permission
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                    </div>
                    <div class="modal-body">
                        Are you sure you want to revoke this Permission?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="button-delete" class="btn btn-danger waves-effect waves-light text-white"
                            onclick="deleteDiscipline()">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <input type="hidden" value="-1" id="deleteID">
                        <h5 class="modal-title" id="exampleModalLongTitle">Revoke
                            Permission
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                    </div>
                    <div class="modal-body">
                        Are you sure you want to revoke this Permission?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('admin.role.revoke.permission', [$role->id, $role_permission->id]) }}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger waves-effect waves-light text-white">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}


    @endsection
    @section('scripts')
        {{-- <script src="{{ asset('admin/dist/js/pages/jasny-bootstrap.js') }}"></script> --}}
        <script>
            function openDeleteDialog(roleId, id) {
                $("#roleId").val(roleId);
                $("#permissionId").val(id);
                $("#deleteModal").modal('show');
            }

            function deleteDiscipline() {
                $("#button-delete").text('Loading...');
                var perId = $("#permissionId").val()
                var rolId = $("#roleId").val()
                var route = "/admin/role-permissions/" + rolId + "/" + perId
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: route, // the endpoint
                    type: "GET", // http method
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $("#button-delete").prop("disabled", false);
                        $("#button-delete").text("Yes");
                        showToaster('success', 'Success', data.message);
                        location.reload();
                        $('#deleteModal').modal('hide');
                    },
                    error: function(error) {
                        $("#button-delete").prop("disabled", false);
                        $("#button-delete").text("Yes");
                        showToaster('error', 'Error', error);

                    },
                });
            }
        </script>
    @endsection
