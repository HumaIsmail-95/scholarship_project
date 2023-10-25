@extends('layouts.admin')
@section('title', 'Roles')
@section('links')
    {{-- <link href="{{ asset('admin/dist/css/pages/floating-label.css') }}" rel="stylesheet"> --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Roles</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                    @can('create-role')
                        <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" alt="default"
                            data-bs-toggle="modal" data-bs-target="#addRoleModal"><i class="fa fa-plus-circle"></i> Create
                            Role</button>
                    @endcan
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Roles List</h4>
                        {{-- <h6 class="card-subtitle mb-3">Simple table example</h6> --}}
                        <div class="table-responsive">
                            <table data-bs-toggle="table" data-height="250" data-mobile-responsive="true"
                                class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="table_id">
                                    @foreach ($roles as $role)
                                        <tr id='row_{{ $role->id }}' class="tr-class-1">
                                            <td id="td-id-1" class="td-class-1"> {{ $role->name }} </td>
                                            <td>
                                                <div class="btn-group">
                                                    @can('edit-role')
                                                        <button class="btn btn-dark"
                                                            onclick="openEditModal({{ json_encode($role) }})"> <i
                                                                class=" fas fa-pencil-alt"></i>
                                                            Edit</button>
                                                    @endcan
                                                    <button type="button"
                                                        class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @can('delete-role')
                                                            <a class="dropdown-item"
                                                                href="javascript:openDeleteDialog({{ $role->id }})"> <i
                                                                    class="fas fa-trash"></i> Delete</a>
                                                        @endcan
                                                        @can('role-permissions')
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.role.permissions', $role->id) }}">
                                                                <i class=" fas fa-key"></i> Role Permissions</a>
                                                        @endcan

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="pagination justify-content-center">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="addRoleModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Role</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <form class="floating-labels" id="role-form" method="post" action="javascript:;" onsubmit="submitRole()">
                    @csrf
                    <div class="modal-body">
                        <div class="form-validation">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="name form-control" id="name" name="name"
                                        placeholder="Enter a name.." :value="old('name')">
                                    <div id="name_text" class="text-danger errors"></div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="button-save"
                            class="btn btn-danger waves-effect waves-light text-white">Add
                            Role</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" value="-1" id="deleteID">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Role
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Role?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="button-delete" class="btn btn-danger waves-effect waves-light text-white"
                        onclick="deleteRole()">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- edit --}}
    <div class="modal fade" id="editModalRole">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form class="form-valide" id="edit-role-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="-1" id="role_id">
                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-validation">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" id="edit_name" name="name"
                                        placeholder="Enter a name.." value="">
                                    <div id="edit_name_text" class="text-danger"></div>
                                </div>
                                </label>

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="button-update" onclick="editRole(this)" class="btn btn-primary">Edit
                        Role</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    {{-- view --}}
    <div class="modal fade" id="viewModalUser">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form class="form-valide" id="view-role-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center p-2">
                                <img id="view_image_preview" src="{{ url('images/profile/default_image.png') }}"
                                    alt="" width="120" class="rounded-circle border border-dark" />
                            </div>
                        </div>
                        <div class="form-validation">
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <label class=" col-form-label" id="view_name" for="">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 text-center">
                                    <label class="col-lg-4 col-form-label" id="view_guard_name" for="">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect"
                                data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
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

        function submitRole() {


            var form = $('#role-form')[0];
            console.log('form ', form);
            $("#button-save").text('Loading...');


            const myFormData = new FormData(form);
            console.log(' roles', myFormData);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/roles", // the endpoint
                type: "POST", // http method
                processData: false,
                contentType: false,
                data: myFormData,
                beforeSend: function() {
                    $(form)
                    $('.backend-error-text').text('')
                    $("#button-save").prop("disabled", true);

                },
                success: function(data) {


                    $("#button-save").prop("disabled", false);
                    $("#button-save").text("Add Role");
                    showToaster('success', 'Success', data.message);
                    document.getElementById("role-form").reset();
                    const RLOE = JSON.stringify(data.role)
                    var string =
                        `<tr id="row_${data.role.id}">
                           <td id="td-id-1" class="td-class-1">${data.role.name} </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-dark"  id="btnGroupDrop${data.role.id}" onclick='openEditModal(${RLOE})'> <i
                                            class=" fas fa-pencil-alt"></i> Edit</button>
                                    <button type="button"
                                        class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"  href="javascript:openDeleteDialog(${data.role.id});"> <i
                                                class="fas fa-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="javascript:void(0)"  onclick="openViewModal(${data.role})"> <i
                                                class="fas fa-eye"></i> View</a>
                                    </div>
                                </div>
                            </td>
                       </tr>`
                    $("#table_id").append(string);
                    $('#addRoleModal').modal('hide');






                },
                error: function(error) {
                    $(form)
                    $("#button-save").prop("disabled", false);
                    $("#button-save").text("Add Role");
                    var errorMessage = error.statusText;
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error)
                    }
                    showToaster('error', 'Error', errorMessage);

                },
            });
        }

        function editRole() {
            var form = $('#edit-role-form')[0];
            $("#button-update").text('Loading...');
            role_id = form.role_id.value;
            console.log('role id ', role_id);
            const myFormData = new FormData(form);
            const formDataObj = {};
            myFormData.forEach((value, key) => (formDataObj[key] = value));
            console.log(formDataObj);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "/admin/roles/" + role_id, // the endpoint
                type: "POST", // http method
                processData: false,
                contentType: false,
                data: myFormData,
                beforeSend: function() {
                    $(form)
                    $('.backend-error-text').text('')
                    $("#button-update").prop("disabled", true);

                },
                success: function(data) {
                    $("#button-update").prop("disabled", false);
                    $("#button-update").text("Edit Role");

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);

                    showToaster('success', 'Success', data.message);

                    $(form)
                        .find('[type="button"]')
                        .prop("disabled", false);
                    const RLOE = JSON.stringify(data.role)
                    $("#row_" + data.role.id).remove();
                    var string =
                        `<tr id="row_${data.role.id}">
                           <td id="td-id-1" class="td-class-1">${data.role.name} </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-dark"
                                                onclick='openEditModal(${RLOE})'> <i
                                                        class=" fas fa-pencil-alt"></i>
                                                    Edit</button>
                                                <button type="button"
                                                    class="btn btn-dark dropdown-toggle text-white dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                    href="javascript:openDeleteDialog(${data.role.id});"> <i
                                                            class="fas fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                       </tr>
                       `
                    $("#table_id").append(string);
                    $('#editModalRole').modal('hide');


                },
                error: function(error) {
                    $(form)
                    $("#button-update").prop("disabled", false);
                    $("#button-update").text("Edit Role");
                    var errorMessage = error.statusText;
                    if (error.status == 422) {
                        errorMessage = handleValidationErrors(error, 'edit')
                    }

                    showToaster('error', 'Error', errorMessage);

                },
            });
        }


        function openDeleteDialog(id) {
            $("#deleteID").val(id);
            $("#deleteModal").modal('show');
        }

        function deleteRole() {
            $("#button-delete").text('Loading...');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "/admin/roles/" + $("#deleteID").val(), // the endpoint
                type: "DELETE", // http method
                processData: false,
                contentType: false,
                success: function(data) {
                    $("#button-delete").prop("disabled", false);
                    $("#button-delete").text("Yes");
                    $('.alert-success').html(data.success).fadeIn('slow');
                    document.getElementById("row_" + $("#deleteID").val()).remove();
                    swal({
                        title: "",
                        text: data.message,
                        icon: "success",
                    });
                    showToaster('success', 'Success', data.message);
                    location.reload()
                    $('#deleteModal').modal('hide');
                },
                error: function(error) {
                    $("#button-delete").prop("disabled", false);
                    $("#button-delete").text("Yes");
                    alert(error);

                    showToaster('error', 'Error', error);

                },
            });
        }

        function openEditModal(role) {
            console.log(' i m here', role);
            document.getElementById('edit_name').value = role.name;

            document.getElementById('role_id').value = role.id;


            $("#editModalRole").modal('show')
        }

        function handleValidationErrors(error, type = 'create') {
            let errors = error.responseJSON.errors;
            var errorMessage = error.responseJSON.message
            var element = '';
            $.each(errors, function(key, item) {
                element = key.split('.')
                if (element.length > 1) {
                    element = `${element[0]}_${element[1]}`
                } else {
                    element = `${element}`
                }
                // dataAttr = $(element).closest('.tab').data('id')
                // $(`.step-${dataAttr}`).addClass('backend-error')
                if (type == 'edit') {
                    console.log('edit', element);
                    $(`#edit_${element}_text`).text(item[0])
                } else if (type == 'create') {
                    $(`#${element}_text`).text(item[0])
                }
            });

            return errorMessage;
        }
    </script>
@endsection
